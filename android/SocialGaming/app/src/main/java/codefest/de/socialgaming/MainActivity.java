package codefest.de.socialgaming;

import android.app.Notification;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.view.KeyEventCompat;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.app.NotificationCompat;
import android.view.KeyEvent;
import android.view.ViewTreeObserver;
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

    private final String server = "10.0.2.2";//"192.168.206.8";
    private Timer pullTimer;
    private Vector<Integer> receivedNotifications = new Vector<>();
    private ViewTreeObserver.OnScrollChangedListener scrollListener;
    private SwipeRefreshLayout layout = null;
    private WebView webView = null;

    private void sendNotification(int id, String title, String text) {
        Intent notificationIntent = new Intent(this, MainActivity.class);
        notificationIntent.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP
                | Intent.FLAG_ACTIVITY_SINGLE_TOP);
        PendingIntent intent = PendingIntent.getActivity(this, 0,
                notificationIntent, 0);
        Notification notification = new NotificationCompat.Builder(this)
                .setSmallIcon(R.drawable.appicon)
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
        webView = (WebView) findViewById(R.id.webview);
        layout = (SwipeRefreshLayout) findViewById(R.id.swipe_container);
        webView.setWebViewClient(new WebViewClient() {
            public void onPageFinished(WebView view, String url) {
                layout.setRefreshing(false);
            }
        });
        webView.getSettings().setJavaScriptEnabled(true);
        webView.loadUrl("http://" + server);

        layout.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                webView.reload();
            }
        });

        pullTimer = new Timer();
        pullTimer.schedule(new TimerTask() {
            private void checkNotifications() {
                MainActivity.this.checkNotifications(MainActivity.currentIndex++);
            }

            @Override
            public void run() {
                checkNotifications();
            }
        }, 0, 10 * 60 * 1000);
        
    }
    private static int currentIndex = 0;

    private void checkNotifications(int i) {
        try {
            InputStream inputStream = (new URL("http://" + server + "/android/getHints")).openStream();
            Scanner s = new Scanner(inputStream).useDelimiter("\\A");
            String string = s.hasNext() ? s.next() : "";
            JSONArray notificationArray = new JSONArray(string);
            if(notificationArray.length() >= i){
                JSONObject n = notificationArray.getJSONObject(i);
                String hint = n.getString("hint");
                String show = n.getString("show");
                int id = n.getInt("id");
                if (!MainActivity.this.receivedNotifications.contains(id)) {
                    MainActivity.this.sendNotification(id, show, hint);
                    MainActivity.this.receivedNotifications.add(id);
                }
            }else{
                this.pullTimer.cancel();
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    @Override
    public void onStart() {
        super.onStart();
        ((NotificationManager) getSystemService(NOTIFICATION_SERVICE)).cancelAll();
        layout.getViewTreeObserver().addOnScrollChangedListener(scrollListener =
                new ViewTreeObserver.OnScrollChangedListener() {
                    @Override
                    public void onScrollChanged() {
                        if (webView.getScrollY() == 0)
                            layout.setEnabled(true);
                        else
                            layout.setEnabled(false);

                    }
                });
    }

    @Override
    public void onStop() {
        layout.getViewTreeObserver().removeOnScrollChangedListener(scrollListener);
        super.onStop();
    }

    @Override
    public boolean onKeyDown(int keyCode, KeyEvent event) {
        if (event.getAction() == KeyEvent.ACTION_DOWN) {
            switch (keyCode) {
                case KeyEvent.KEYCODE_BACK:
                    if (webView.canGoBack()) {
                        webView.goBack();
                    } else {
                        finish();
                    }
                    return true;
            }

        }
        return super.onKeyDown(keyCode, event);
    }
}