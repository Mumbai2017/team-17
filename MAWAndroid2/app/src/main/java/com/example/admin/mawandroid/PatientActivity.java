package com.example.admin.mawandroid;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import com.example.admin.mawandroid.server.patientvolunteer;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class PatientActivity extends AppCompatActivity {

    ListView listView;
    ArrayAdapter arrayAdapter;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_patient);
        setTitle("Volunteer Dashboard");

        Session session = Session.getInstance();
        patientvolunteer pa = new patientvolunteer(this, this);
        pa.execute(session.getDefaults("emailid",this));


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
                        System.out.println("Entered here");
                        JSONObject jsonO = json1.getJSONObject(position);
//                        Toast.makeText(PatientActivity.this, jsonO.getString("id"), Toast.LENGTH_SHORT).show();;
                        ;
                        Intent intent = new Intent(PatientActivity.this, PatientWishActivity.class);
                        intent.putExtra("name",jsonO.getString("name"));
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


}
