package com.example.admin.mawandroid;

import android.content.Context;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Toast;

import com.example.admin.mawandroid.server.docreferdetails;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

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

    public void updateList(final ArrayList details){
        try {
            listView = (ListView) findViewById(R.id.patientList);
            arrayAdapter = new ArrayAdapter(this, R.layout.list_text, details.toArray(new String[details.size()]));
            listView.setAdapter(arrayAdapter);
            Session session = Session.getInstance();
            JSONObject json = new JSONObject(session.getDefaults("data", this));
            final JSONArray json1 = json.getJSONArray("data");
            listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
                @Override
                public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                    try {
                        JSONObject jsonO = json1.getJSONObject(position);
                        //Toast.makeText(DoctorActivity.this, jsonO.getString("id"), Toast.LENGTH_SHORT).show();;
                        ;
                        Intent intent = new Intent(DoctorActivity.this, PatientDisplayActivity.class);
                        intent.putExtra("id",jsonO.getString("id"));
                        startActivity(intent);

                    } catch (JSONException e) {
                        e.printStackTrace();
                    }

                }
            });
        }catch(Exception e){

        }


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
                return true;
            case R.id.donor:
                startActivity(new Intent(DoctorActivity.this, DonorActivity.class));
                return true;
            default:
                return super.onOptionsItemSelected(item);
        }
    }


}
