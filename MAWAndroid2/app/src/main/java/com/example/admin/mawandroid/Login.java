package com.example.admin.mawandroid;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.TextView;

import com.example.admin.mawandroid.server.loginasync;
import com.example.admin.mawandroid.validation.ChatActivity;

public class Login extends AppCompatActivity {


    TextView textView;
    Button button;
    ImageButton image;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        Session session = Session.getInstance();
        if(!session.getDefaults("email",this).equalsIgnoreCase("")){
            if(session.getDefaults("type",this).toString().equalsIgnoreCase("0")){
                startActivity(new Intent(this, DoctorActivity.class));
            }else if(session.getDefaults("type",this).toString().equalsIgnoreCase("1")){
                startActivity(new Intent(this, PatientWishActivity.class));
            }else if(session.getDefaults("type",this).toString().equalsIgnoreCase("2")){
                startActivity(new Intent(this, DoctorActivity.class));
            }else{

            }
        }



        textView = (TextView) findViewById(R.id.registerlink);
        textView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(Login.this, Registration.class));
            }
        });

        button = (Button)findViewById(R.id.login);
        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                loginasync l = new loginasync(Login.this,Login.this);
                EditText email = (EditText)findViewById(R.id.email);
                EditText pass = (EditText)findViewById(R.id.pwd);
                l.execute(email.getText().toString(), pass.getText().toString());


            }
        });


        image = (ImageButton) findViewById(R.id.chat);
        image.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(Login.this, ChatActivity.class));
            }
        });
    }
}
