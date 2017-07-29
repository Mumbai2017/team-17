package com.example.admin.mawandroid.validation;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.webkit.WebSettings;
import android.webkit.WebView;

import com.example.admin.mawandroid.R;

public class ChatActivity extends AppCompatActivity {


    WebView webView;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_chat);

        webView = (WebView) findViewById(R.id.webChat);
        webView.loadUrl("https://sandeshmuralidharan.000webhostapp.com/chatbot.html");
        WebSettings webSettings = webView.getSettings();
        webSettings.setJavaScriptEnabled(true);
    }
}
