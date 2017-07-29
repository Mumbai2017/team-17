package com.example.admin.mawandroid.validation;

import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;

/**
 * Created by Poornima on 5/31/2016.
 */
public class Validator {
    public static boolean isValidPassword(String password){
        if(password.trim().length()>=5 && password.trim().length()<=12)
            return true;
        return false;
    }

    public static boolean isValidUsername(String username){

        if(username.trim().length()>=5)
            return true;
        return false;
    }

    public static boolean isOnline(Context context) {
        ConnectivityManager connMgr = (ConnectivityManager) context.getSystemService(context.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
        return (networkInfo != null && networkInfo.isConnected());
    }


}
