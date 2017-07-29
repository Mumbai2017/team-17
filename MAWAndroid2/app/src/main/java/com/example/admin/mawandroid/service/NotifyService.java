package com.example.admin.mawandroid.service;

import android.app.Activity;
import android.app.Service;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.IBinder;
import android.support.annotation.Nullable;
import android.widget.Toast;

/**
 * Created by Poornima on 6/1/2016.
 */
public class NotifyService extends Service {


    @Override
    public void onCreate() {
        // TODO Auto-generated method stub

        super.onCreate();
    }

    @Override
    public int onStartCommand(Intent intent, int flags, int startId) {
        // TODO Auto-generated method stub
        SharedPreferences sharedPreferences = getSharedPreferences("online", Activity.MODE_PRIVATE);
        SharedPreferences.Editor sharedEditor = sharedPreferences.edit();

        if (isOnline()) {
               sharedEditor.putString("status","Online");
            } else {
            sharedEditor.putString("status","Offline");
            }

        stopSelf();

        return super.onStartCommand(intent, flags, startId);
    }

    @Override
    public void onDestroy() {
        // TODO Auto-generated method stub
        super.onDestroy();
    }

    public boolean isOnline() {
        ConnectivityManager connMgr = (ConnectivityManager)getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
        Toast.makeText(this,"Hi service", Toast.LENGTH_LONG).show();
        return (networkInfo != null && networkInfo.isConnected());
    }



    @Nullable
    @Override
    public IBinder onBind(Intent intent) {
        return null;
    }
}
