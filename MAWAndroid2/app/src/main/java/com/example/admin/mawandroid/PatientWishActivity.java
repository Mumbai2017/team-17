package com.example.admin.mawandroid;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.EditText;

public class PatientWishActivity extends AppCompatActivity {

    EditText editText;

    String name, wish1, wish2, wish3;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_patient_wish);



    }
}
