package com.example.admin.mawandroid.server;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.util.Log;

import com.example.admin.mawandroid.DoctorActivity;
import com.example.admin.mawandroid.Notifier.Notifier;
import com.example.admin.mawandroid.PatientWishActivity;
import com.example.admin.mawandroid.Session;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;

/**
 * Created by Admin on 30-07-2017.
 */

public class registerasync extends AsyncTask<String,Void,String> {

    Context context;
    Activity activity;



    public registerasync(Context context, Activity activity){
        this.context = context;
        this.activity = activity;

    }


    @Override
    protected String doInBackground(String... params) {
        try {

            URL url=new URL(IP.register);
            Log.e("URL.....",IP.register);
            HttpURLConnection httpURLConnection=(HttpURLConnection)url.openConnection();
            httpURLConnection.setRequestMethod("POST");
            httpURLConnection.setDoOutput(true);
            httpURLConnection.setDoInput(true);
            OutputStream outputStream=httpURLConnection.getOutputStream();
            BufferedWriter bufferedWriter=new BufferedWriter((new OutputStreamWriter(outputStream,"UTF-8")));
            String data= URLEncoder.encode("name","UTF-8")+"="+URLEncoder.encode(params[0],"UTF-8")+"&"+
                    URLEncoder.encode("email","UTF-8")+"="+URLEncoder.encode(params[1],"UTF-8")+"&"+
                    URLEncoder.encode("password","UTF-8")+"="+URLEncoder.encode(params[2],"UTF-8")+"&"+
                    URLEncoder.encode("dob","UTF-8")+"="+URLEncoder.encode(params[3],"UTF-8")+"&"+
                    URLEncoder.encode("address","UTF-8")+"="+URLEncoder.encode(params[4],"UTF-8")+"&"+
                    URLEncoder.encode("state","UTF-8")+"="+URLEncoder.encode(params[5],"UTF-8")+"&"+
                    URLEncoder.encode("city","UTF-8")+"="+URLEncoder.encode(params[6],"UTF-8")+"&"+
                    URLEncoder.encode("type","UTF-8")+"="+URLEncoder.encode(params[7],"UTF-8")+"&"+
                    URLEncoder.encode("contact","UTF-8")+"="+URLEncoder.encode(params[8],"UTF-8");
            bufferedWriter.write(data);
            bufferedWriter.flush();
            bufferedWriter.close();
            outputStream.close();
            InputStream inputStream=httpURLConnection.getInputStream();

            BufferedReader bufferedReader=new BufferedReader((new InputStreamReader(inputStream,"iso-8859-1")));
            String response="";
            String line="";
            while ((line=bufferedReader.readLine())!=null)
            {
                response+=line;
            }
            bufferedReader.close();
            inputStream.close();
            httpURLConnection.disconnect();
            System.out.println("In Background Task"+response);
            return response;

        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }
        return null;
    }

    @Override
    protected void onPreExecute() {
        super.onPreExecute();
    }




    @Override
    protected void onPostExecute(String s) {



        if(s==null){
            Notifier.createAlertDialog(context, "Please try again later", "Connection error","ok");
        }else{

            Notifier.createAlertDialog(context,s,"Result","Ok");



        }

        super.onPostExecute(s);
    }




}

