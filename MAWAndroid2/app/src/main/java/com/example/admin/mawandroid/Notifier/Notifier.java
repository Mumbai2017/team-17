package com.example.admin.mawandroid.Notifier;

import android.app.AlertDialog;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.support.v7.app.NotificationCompat;

import com.example.admin.mawandroid.R;

/**
 * Created by HP on 23-06-2016.
 */
public class Notifier {

    static ProgressDialog progressDialog;
    static NotificationCompat.Builder noBuilder;
    static NotificationManager notificationManager;
    public static void createAlertDialog(Context context, String message, String Header, String ButtonText){
        final AlertDialog.Builder alertBuilder = new AlertDialog.Builder(context);
        alertBuilder.setMessage(message);
        alertBuilder.setTitle(Header);
        alertBuilder.setPositiveButton(ButtonText, new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {

            }
        });
        alertBuilder.show();

    }



    public static void helpAlertDialog(Context context, String message){
        final AlertDialog.Builder alertBuilder = new AlertDialog.Builder(context);
        alertBuilder.setMessage(message);
        alertBuilder.setTitle("Help");
        //alertBuilder.setIcon(R.drawable.ic_help);
        alertBuilder.setPositiveButton("Ok", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {

            }
        });
        alertBuilder.show();

    }


    public static void errorAlertDialog(Context context, String message, String Header, String ButtonText, int id){
        final AlertDialog.Builder alertBuilder = new AlertDialog.Builder(context);
        alertBuilder.setMessage(message);
        alertBuilder.setTitle(Header);
        alertBuilder.setPositiveButton(ButtonText, new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {

            }
        });
        alertBuilder.setIcon(id);

        alertBuilder.show();

    }

    public static void notificationDialog(Context context, String title, String message){

        notificationManager = (NotificationManager) context.getSystemService(Context.NOTIFICATION_SERVICE);
      //  PendingIntent pendingIntent = PendingIntent.getActivity(context, 0, new Intent(context, home.class), 0);

           noBuilder = (NotificationCompat.Builder) new NotificationCompat.Builder(context)
                .setContentTitle(title)
                .setContentText(message)
                .setOngoing(true)
                .setProgress(100,0,true)
                //.setSmallIcon(R.drawable.ic_notify_logo)
           ;

        notificationManager.notify(1,noBuilder.build());
    }

    public static void notiificationDismiss(){
        if(notificationManager!=null)
        notificationManager.cancel(1);
    }



    public static void showProgressDialog(Context context, String title, String message){
        progressDialog = new ProgressDialog(context,0);
        progressDialog.setCancelable(false);
        progressDialog.setTitle(title);
        progressDialog.setIndeterminate(true);
        progressDialog.setMessage(message);
        progressDialog.show();
    }

    public static void dismissProgressDialog(){

        if(progressDialog!=null)
        progressDialog.dismiss();
    }
}
