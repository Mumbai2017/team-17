package com.example.admin.finalmaw;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.Application;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.preference.PreferenceManager;
import android.support.v7.app.AppCompatActivity;

/**
 * Created by admin on 01-Oct-16.
 */
public class Session extends Application{
    static Session current=new Session();
    static String prefsName="Store";
    //phone no to be used to send payment details offline through sms
    String phone_no="9833170993";
    //ip address of server
    String ip = "192.168.43.72";
    //path for different services
    String helloString = "http://" + ip + ":8080/MainServer/login/dologin";
    String rechargeInfo = "http://" + ip + ":8080/MainServer/login/recharge";
    String loginString = "http://" + ip + ":8080/MainServer/login/loginUser";
    String registrationString = "http://" + ip + ":8080/MainServer/login/registerform";
    String transactionString="http://" + ip + ":8080/MainServer/login/transaction";

    SharedPreferences prefs;
    public static Session getInstance(){
        return current;
    }

    //store value in shared preference
    public void setDefaults(String key, String value, Context context) {
        prefs = context.getSharedPreferences(prefsName,0);
        prefs.edit().putString(key,value).commit();
    }

    //remove value from shared preference
    public void removeKey(String key, Context context) {
        prefs = context.getSharedPreferences(prefsName,0);
        prefs.edit().remove(key).apply();
    }

    //get value from shared preference
    public  String getDefaults(String key,Context context) {
        prefs= context.getSharedPreferences(prefsName,0);
        return prefs.getString(key,"");
    }

    //clear shared preference
    public void clearSharedPreference(Context context){
        prefs=context.getSharedPreferences(prefsName,0);
        prefs.edit().clear().commit();
    }
    /*public void msg(String title,String content,Context context){
        AlertDialog alertDialog=new AlertDialog.Builder(context).create();
        alertDialog.setTitle(title);
        alertDialog.setMessage(content);
        alertDialog.show();
    }*/

    public boolean isNetworkAvailable(Context context) {
        ConnectivityManager connectivityManager=(ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo activeNetworkInfo = connectivityManager.getActiveNetworkInfo();
        return activeNetworkInfo != null && activeNetworkInfo.isConnected();
    }

    //display ok message
    public void msg(String title,String content,Context context){
        AlertDialog.Builder alertDialog=new AlertDialog.Builder(context);
        alertDialog.setTitle(title);
        alertDialog.setMessage(content);
        alertDialog.setPositiveButton("OK",null);
        alertDialog.create();
        alertDialog.show();
    }

    public void exitMsg(String title, final String content, final Context context){
        AlertDialog.Builder alertDialog=new AlertDialog.Builder(context);
        alertDialog.setTitle(title);
        alertDialog.setMessage(content);
        alertDialog.setPositiveButton("OK",new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                ((Activity)context).finish();
                System.exit(0);
            }
        });
        alertDialog.create();
        alertDialog.show();
    }

    //checking if value exists for a particular key
    public Boolean checkSharedPreference(String key,Context context){
        String value=getDefaults(key,context);
        if(value.equals("")){
            return false;
        }
        else{
            return true;
        }
    }
}
