package com.example.admin.mawandroid;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.ListView;

public class PatientActivity extends AppCompatActivity {

    ListView listView;
    ArrayAdapter arrayAdapter;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_patient);
        setTitle("Volunteer Dashboard");


        String array[]={"name value \n name value"};
        listView = (ListView) findViewById(R.id.patientList);
        arrayAdapter = new ArrayAdapter(this, R.layout.list_text,array);
        listView.setAdapter(arrayAdapter);

    }
}
