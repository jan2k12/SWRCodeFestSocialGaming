package codefest.de.socialgaming;

import android.app.Notification;
import android.app.NotificationManager;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.app.NotificationCompat;
import android.webkit.WebView;

import java.util.Timer;
import java.util.TimerTask;
import java.util.concurrent.TimeUnit;

public class MainActivity extends AppCompatActivity {

    private Timer pullTimer;
    private static int notificationId = 0;

    private void sendNotification(String text) {
        Notification notification = new NotificationCompat.Builder(this)
                .setSmallIcon(R.drawable.icon)
                .setContentTitle("Test")
                .setContentText(text).build();
        NotificationManager manager = (NotificationManager) getSystemService(NOTIFICATION_SERVICE);
        manager.notify(notificationId, notification);
        notificationId++;
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        getSupportActionBar().hide();
        setContentView(R.layout.activity_main);
        WebView webView = (WebView) findViewById(R.id.webview);
        webView.loadUrl("http://192.168.206.8/");

        pullTimer = new Timer();
        pullTimer.schedule(new TimerTask() {
            @Override
            public void run() {
                MainActivity.this.sendNotification("A");
            }
        }, 0, 1000);

        Timer stopTimer = new Timer();
        stopTimer.schedule(new TimerTask() {
            @Override
            public void run() {
                MainActivity.this.sendNotification("B");
                MainActivity.this.pullTimer.cancel();
            }
        }, 20000);
    }
}