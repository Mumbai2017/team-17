package com.example.admin.mawandroid.server;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.util.Log;

import com.example.admin.mawandroid.DoctorActivity;
import com.example.admin.mawandroid.Notifier.Notifier;
import com.example.admin.mawandroid.PatientDisplayActivity;
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

public class patientdisplay extends AsyncTask<String, Void, String> {

    Context context;
    Activity activity;



    public patientdisplay(Context context, Activity activity){
        this.context = context;
        this.activity = activity;

    }


    @Override
    protected String doInBackground(String... params) {
        try {

            URL url=new URL(IP.patientwish);
            Log.e("URL.....",IP.login);
            HttpURLConnection httpURLConnection=(HttpURLConnection)url.openConnection();
            httpURLConnection.setRequestMethod("POST");
            httpURLConnection.setDoOutput(true);
            httpURLConnection.setDoInput(true);
            OutputStream outputStream=httpURLConnection.getOutputStream();
            BufferedWriter bufferedWriter=new BufferedWriter((new OutputStreamWriter(outputStream,"UTF-8")));
            String data= URLEncoder.encode("id","UTF-8")+"="+URLEncoder.encode(params[0],"UTF-8");
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

            String data = "";

        if(s==null){
            Notifier.createAlertDialog(context, "Please try again later", "Connection error","ok");
        }else{
//            Notifier.createAlertDialog(context, s, "connection","Ok");
            Log.e("Entered...","else");
            try {
                Log.e("Before","json");
                JSONObject json = new JSONObject(s);
                JSONArray json1 = json.getJSONArray("data");
                Log.e("JSON",s);
                // context.startActivity(new Intent(context, DoctorActivity.class));
//                  Notifier.createAlertDialog(context,Integer.toString(json1.length()),"test","Ok");
                for (int i = 0; i < json1.length(); i++) {
                    JSONObject jsonO = json1.getJSONObject(i);
                    data=data +"\n\nName :"+jsonO.getString("name");
                    data=data +"\n\nAge :"+jsonO.getString("age");
                    data=data +"\n\nStatus :"+jsonO.getString("status");
                    data=data +"\n\nIs completed? :"+jsonO.getString("isCompleted");
                    data=data +"\n\nDescription :"+jsonO.getString("description");
                }

                PatientDisplayActivity pa = (PatientDisplayActivity) context;
                pa.setData(data);


            }catch(Exception e){

            }




        }

        super.onPostExecute(s);
    }




}

