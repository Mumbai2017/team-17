package com.example.admin.mawandroid;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TextView;

import com.example.admin.mawandroid.Notifier.Notifier;
import com.example.admin.mawandroid.server.patientdisplay;

public class PatientDisplayActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_patient_display);
        String id = (String) getIntent().getExtras().getString("id");
        Notifier.createAlertDialog(this, id, "test","Ok");
        patientdisplay pa = new patientdisplay(this,this);
        pa.execute(id);


    }

    public void setData(String data){
        TextView textView = (TextView)findViewById(R.id.data);
        textView.setText(data);

    }
}
