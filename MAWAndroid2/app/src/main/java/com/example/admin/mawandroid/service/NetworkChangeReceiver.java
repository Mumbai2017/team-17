package com.example.admin.mawandroid.service;

/**
 * Created by Poornima on 6/1/2016.
 */
import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.util.Log;
import android.widget.Toast;

public class NetworkChangeReceiver extends BroadcastReceiver {
    public NetworkChangeReceiver() {
    }

    @Override
    public void onReceive(Context context, Intent intent) {

        // an Intent broadcast.
        Log.i("app","Reciever BroadCast");
        Toast.makeText(context,"", Toast.LENGTH_SHORT).show();
        context.startService(new Intent(context, NotifyService.class));

    }
}
