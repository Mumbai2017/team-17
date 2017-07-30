package com.example.admin.mawandroid;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.Spinner;

import com.example.admin.mawandroid.server.patientdoctor;

public class PatientRecommendActivity extends AppCompatActivity {


    Spinner spinner;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_patient_recommend);
        setTitle("Patient recommend");


        //
        spinner = (Spinner) findViewById(R.id.gender);
        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(this,
                R.array.gener, android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner.setAdapter(adapter);
    }

    public void submitPatient(View v){
        EditText eHospitalName=(EditText)findViewById(R.id.hospname);
        String hosp=eHospitalName.getText().toString();
        EditText epname=(EditText)findViewById(R.id.pname);
        String pname=epname.getText().toString();
        Spinner sp=(Spinner)findViewById(R.id.gender);
        String gender=sp.getSelectedItem().toString();
        EditText eDob=(EditText)findViewById(R.id.dob);
        String dob=eDob.getText().toString();
        EditText emTongue=(EditText)findViewById(R.id.mtongue);
        String mTongue=emTongue.getText().toString();
        EditText eParentName=(EditText)findViewById(R.id.parentname);
        String parentName=eParentName.getText().toString();
        EditText eContact=(EditText)findViewById(R.id.contact);
        String contact=eContact.getText().toString();
        EditText eTempAdd=(EditText)findViewById(R.id.temp_address);
        String tempAdd=eTempAdd.getText().toString();
        EditText ePermanentAdd=(EditText)findViewById(R.id.perm_address);
        String permanentAdd=ePermanentAdd.getText().toString();
        EditText eDocNotes=(EditText)findViewById(R.id.docNotes);
        String docNotes=eDocNotes.getText().toString();
        EditText email = (EditText) findViewById(R.id.email);
        String em = email.getText().toString();
        CheckBox ch=(CheckBox)findViewById(R.id.rush_wish);
        String rush_wish="0";
        if(ch.isChecked()){
            rush_wish="1";
        }

        patientdoctor pd=new patientdoctor(this,this);
        pd.execute(pname,em,mTongue,parentName, dob, "Mumbai", "Maharashtra",contact,rush_wish, permanentAdd, docNotes);

    }

}
