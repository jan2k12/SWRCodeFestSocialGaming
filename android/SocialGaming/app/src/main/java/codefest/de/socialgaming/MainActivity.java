package codefest.de.socialgaming;

import android.app.Notification;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.app.NotificationCompat;
import android.webkit.WebView;
import android.webkit.WebViewClient;

import com.google.firebase.messaging.FirebaseMessaging;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.InputStream;
import java.net.URL;
import java.util.Scanner;
import java.util.Timer;
import java.util.TimerTask;
import java.util.Vector;

public class MainActivity extends AppCompatActivity {

    private Timer pullTimer;
    private Vector<Integer> receivedNotifications = new Vector<>();

    private void sendNotification(int id, String title, String text) {
        Intent notificationIntent = new Intent(this, MainActivity.class);
        notificationIntent.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP
                | Intent.FLAG_ACTIVITY_SINGLE_TOP);
        PendingIntent intent = PendingIntent.getActivity(this, 0,
                notificationIntent, 0);
        Notification notification = new NotificationCompat.Builder(this)
                .setSmallIcon(R.drawable.icon)
                .setContentTitle(title)
                .setContentText(text)
                .setVibrate(new long[]{200})
                .setContentIntent(intent)
                .build();
        notification.defaults |= Notification.DEFAULT_ALL;
        NotificationManager manager = (NotificationManager) getSystemService(NOTIFICATION_SERVICE);
        manager.notify(id, notification);
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        getSupportActionBar().hide();
        setContentView(R.layout.activity_main);
        final WebView webView = (WebView) findViewById(R.id.webview);
        webView.setWebViewClient(new WebViewClient());
        webView.loadUrl("http://192.168.206.8");

        final SwipeRefreshLayout layout = (SwipeRefreshLayout) findViewById(R.id.swipe_container);
        layout.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                webView.reload();
                layout.setRefreshing(false);
            }
        });

        pullTimer = new Timer();
        pullTimer.schedule(new TimerTask() {
            private void checkNotifications() {
                try {
                    InputStream inputStream = (new URL("http://192.168.206.8/test.json")).openStream();
                    Scanner s = new Scanner(inputStream).useDelimiter("\\A");
                    String string = s.hasNext() ? s.next() : "";
                    JSONObject json = new JSONObject(string);
                    JSONArray notificationArray = json.getJSONArray("notifications");
                    for (int i = 0; i < notificationArray.length(); i++) {
                        JSONObject n = notificationArray.getJSONObject(i);
                        String hint = n.getString("hint");
                        String show = n.getString("show");
                        int id = n.getInt("id");
                        if (!MainActivity.this.receivedNotifications.contains(id)) {
                            MainActivity.this.sendNotification(id, show, hint);
                            MainActivity.this.receivedNotifications.add(id);
                        }
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }
            }

            @Override
            public void run() {
                checkNotifications();
            }
        }, 0, 1000);

        Timer stopTimer = new Timer();
        stopTimer.schedule(new TimerTask() {
            @Override
            public void run() {
                MainActivity.this.sendNotification(0, "Stopped", "");
                MainActivity.this.pullTimer.cancel();
            }
        }, 60000);
        FirebaseMessaging.getInstance().subscribeToTopic("all");
    }

    @Override
    public void onStart() {
        super.onStart();
        ((NotificationManager) getSystemService(NOTIFICATION_SERVICE)).cancelAll();
    }
}