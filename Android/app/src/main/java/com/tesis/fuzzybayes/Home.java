package com.tesis.fuzzybayes;

import android.content.Intent;
import android.os.Handler;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class Home extends AppCompatActivity {
    TextView idtime,idrh,idsuhuudara,idsuhudaun,kesimpulanrh,nilairh,kesimpulanudara,nilaiudara,kesimpulandaun,
            nilaidaun,kesimpulanVPD,
           kontrolsuhu,kontrolkelembapan,idnama;
    ImageView imageView;
    Button Btnpengaturan,Btnhistory,Btnperhitungan;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);
        getSupportActionBar().hide();
        Btnpengaturan = findViewById(R.id.pindahPengaturan);
        Btnhistory = findViewById(R.id.Btnhistory);
        Btnperhitungan = findViewById(R.id.Btnperhitungan);
        idtime = findViewById((R.id.idtime));
        idrh = findViewById((R.id.idrh));
        idsuhuudara = findViewById((R.id.idsuhuudara));
        idsuhudaun = findViewById((R.id.idsuhudaun));
        kesimpulanrh = findViewById((R.id.kesimpulanrh));
        nilairh = findViewById((R.id.nilairh));
        kesimpulanudara = findViewById((R.id.kesimpulanudara));
        nilaiudara = findViewById((R.id.nilaiudara));
        kesimpulandaun = findViewById((R.id.kesimpulandaun));
        nilaidaun = findViewById((R.id.nilaidaun));
        kesimpulanVPD = findViewById((R.id.kesimpulanVPD));
        kontrolsuhu = findViewById((R.id.kontrolsuhu));
        kontrolkelembapan = findViewById((R.id.kontrolkelembapan));
        idnama = findViewById((R.id.idnama));
        imageView = findViewById(R.id.imageView);



        Btnpengaturan.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                Bundle bundle = getIntent().getExtras();
                String HWID = null;
                if (bundle != null) {
                    HWID = bundle.getString("HWID");
                }
                Intent intent = new Intent(Home.this, Pengaturan.class);
                intent.putExtra("HWID", HWID);
                startActivity(intent);
            }
        });

        Btnhistory.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                Bundle bundle = getIntent().getExtras();
                String HWID = null;
                if (bundle != null) {
                    HWID = bundle.getString("HWID");
                }
                Intent intent = new Intent(Home.this, historysensor.class);
                intent.putExtra("HWID", HWID);
                startActivity(intent);
            }
        });

        Btnperhitungan.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                Bundle bundle = getIntent().getExtras();
                String HWID = null;
                if (bundle != null) {
                    HWID = bundle.getString("HWID");
                }
                Intent intent = new Intent(Home.this, Perhitungan.class);
                intent.putExtra("HWID", HWID);
                startActivity(intent);
            }
        });

        ambilData();
    }
    Handler handler = new Handler();
    Runnable runnable;
    int delay = 15*1000; //Delay for 15 seconds.  One second = 1000 milliseconds.


    @Override
    protected void onResume() {
        //start handler as activity become visible

        handler.postDelayed( runnable = new Runnable() {
            public void run() {
                //do something
                ambilData();
                handler.postDelayed(runnable, delay);
            }
        }, delay);

        super.onResume();
    }

// If onPause() is not included the threads will double up when you
// reload the activity

    @Override
    protected void onPause() {
        handler.removeCallbacks(runnable); //stop handler when activity not visible
        super.onPause();
    }

    private void ambilData() {
        Bundle bundle = getIntent().getExtras();
        String HWID = null;
        if (bundle != null) {
            HWID = bundle.getString("HWID");
        } else {
            Intent intent = getIntent();
            HWID = intent.getStringExtra("HWID");}

        String url = "https://manut.lactograin.id/rest/fuzzynaviebayes/" + HWID;
        StringRequest stringRequest = new StringRequest(url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                showsensor(response);

            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        //Toast.makeText(Home.this, error.getMessage(), Toast.LENGTH_LONG).show();

                    }
                });

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    private void showsensor(String response) {
        String time = "";
        String rh = "";
        String suhu_udara = "";
        String suhu_daun = "";
        String Kesimpulan_rh = "";
        String Nilai_rh = "";
        String Kesimpulan_suhu_udara = "";
        String Nilai_suhu_udara = "";
        String Kesimpulan_suhu_daun = "";
        String Nilai_suhu_daun = "";
        String Kesimpulan_VPD = "";
        String Kesimpulan_kontrolsuhu = "";
        String Kesimpulan_kontrolkelembapan = "";
        String nama = "";
        String image = "";

        try {
            JSONObject jsonObject = new JSONObject(response);
            JSONArray result = jsonObject.getJSONArray("Data");
            JSONObject collegeData = result.getJSONObject(0);
            time = collegeData.getString("time");
            rh = collegeData.getString("rh");
            suhu_udara = collegeData.getString("suhu_udara");
            suhu_daun = collegeData.getString("suhu_daun");
            Kesimpulan_rh = collegeData.getString("Kesimpulan_rh");
            Nilai_rh = collegeData.getString("Nilai_rh");
            Kesimpulan_suhu_udara = collegeData.getString("Kesimpulan_suhu_udara");
            Nilai_suhu_udara = collegeData.getString("Nilai_suhu_udara");
            Kesimpulan_suhu_daun = collegeData.getString("Kesimpulan_suhu_daun");
            Nilai_suhu_daun = collegeData.getString("Nilai_suhu_daun");
            Kesimpulan_VPD = collegeData.getString("Kesimpulan_VPD");
            Kesimpulan_kontrolsuhu = collegeData.getString("Kesimpulan_kontrolsuhu");
            Kesimpulan_kontrolkelembapan = collegeData.getString("Kesimpulan_kontrolkelembapan");
            nama = collegeData.getString("nama");
            image = collegeData.getString("image");


        } catch (JSONException e) {
            e.printStackTrace();
        }
        String gambar = "https://manut.lactograin.id/assets/img/profile/" +image;

        idtime.setText(time);
        idrh.setText(rh);
        idsuhuudara.setText(suhu_udara);
        idsuhudaun.setText(suhu_daun);
        kesimpulanrh.setText(Kesimpulan_rh);
        nilairh.setText(Nilai_rh);
        kesimpulanudara.setText(Kesimpulan_suhu_udara);
        nilaiudara.setText(Nilai_suhu_udara);
        kesimpulandaun.setText(Kesimpulan_suhu_daun);
        nilaidaun.setText(Nilai_suhu_daun);
        kesimpulanVPD.setText(Kesimpulan_VPD);
        kontrolsuhu.setText(Kesimpulan_kontrolsuhu);
        kontrolkelembapan.setText(Kesimpulan_kontrolkelembapan);
        idnama.setText(nama);
        Picasso.with(this).load(gambar).into(imageView);

    }

}