package com.example.admin.mawandroid;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.Spinner;

import com.example.admin.mawandroid.server.registerasync;

public class Registration extends AppCompatActivity {

    EditText editText;
    Spinner spinner;

    String name, email, password, dob, address, state, city, type, contact;

    CheckBox check;

    Button button;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registration);
        button = (Button) findViewById(R.id.submit);
        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                editText = (EditText)findViewById(R.id.name);
                name= editText.getText().toString();
                editText = (EditText)findViewById(R.id.email);
                email = editText.getText().toString();
                editText = (EditText)findViewById(R.id.password);
                password=editText.getText().toString();
                editText = (EditText)findViewById(R.id.dob);
                dob = editText.getText().toString();
                editText = (EditText)findViewById(R.id.address);
                address = editText.getText().toString();

                editText = (EditText)findViewById(R.id.contact);
                contact = editText.getText().toString();

                spinner = (Spinner)findViewById(R.id.select_state);
                state = (String)spinner.getSelectedItem();


                spinner = (Spinner)findViewById(R.id.select_city);
                city = (String)spinner.getSelectedItem();

                check=(CheckBox)findViewById(R.id.doc);
                if(check.isChecked()){
                    type="0";
                }

                check=(CheckBox)findViewById(R.id.wish_grant);
                if(check.isChecked()){
                    type="1";
                }

                check=(CheckBox)findViewById(R.id.wish_org);
                if(check.isChecked()){
                    type="2";
                }

                check=(CheckBox)findViewById(R.id.donor);
                if(check.isChecked()){
                    type="3";
                }

                registerasync r = new registerasync(Registration.this, Registration.this);
                r.execute(name, email, password, dob, address, state, city, type,contact);


            }
        });

    }
}
