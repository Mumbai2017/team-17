package com.example.admin.mawandroid;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;

import com.example.admin.mawandroid.server.docreferdetails;

import java.util.ArrayList;
import java.util.List;

public class DoctorActivity extends AppCompatActivity {


    ListView listView;
    ArrayAdapter arrayAdapter;

    Button buttondoctor, buttonaddpatient;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_doctor);
        setTitle("Dashboard");


        String array[]={"name value \n name value"};
        listView = (ListView) findViewById(R.id.patientList);
        arrayAdapter = new ArrayAdapter(this, R.layout.list_text,array);
        listView.setAdapter(arrayAdapter);


        //Doctor buton redirection
        buttondoctor = (Button)findViewById(R.id.doctorrecommend);
        buttondoctor.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(DoctorActivity.this, DoctorRecommendActivity.class));
            }
        });

        buttonaddpatient = (Button) findViewById(R.id.addpatient);
        buttonaddpatient.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(DoctorActivity.this, PatientRecommendActivity.class));
            }
        });

        Session session = Session.getInstance();
        docreferdetails d = new docreferdetails(this,this);
        d.execute(session.getDefaults("email",this));

    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.doctor, menu);
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        int id = item.getItemId();
        switch (id){
            case R.id.vol1:
                startActivity(new Intent(this, PatientActivity.class));
            default:
                return super.onOptionsItemSelected(item);
        }
    }


}
