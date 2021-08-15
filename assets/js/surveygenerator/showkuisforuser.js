var defaultThemeColors = Survey.StylesManager.ThemeColors["default"];
defaultThemeColors["$main-color"] = "#7ff07f";
defaultThemeColors["$main-hover-color"] = "#6fe06f";
defaultThemeColors["$text-color"] = "#4a4a4a";
defaultThemeColors["$header-color"] = "#000000";

defaultThemeColors["$header-background-color"] = "#ffffff";
defaultThemeColors["$body-container-background-color"] = "#ffffff";

Survey.StylesManager.applyTheme();

$(document).ready(function () {
    $.ajax({
        method: 'POST',
        url: 'php/insertdataKuisioner.php',
        data: {
            task: 'selectDataKuisioner'
        },
        success: function (response) {
            if (response) {
                let WidgetSukses = `
                <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
                    <h1>Terima kasih atas partisipasi Anda</h1>
                    <p>Kuisioner yang telah anda isi, telah kami terima.</p>
                </div>
                `;
                $('#surveyElement').html(WidgetSukses);
            } else {
                showKuisioner();
            }
        }
    })
})

function showKuisioner() {
    var json = {
        "completedHtml": "<h3>Terima kasih atas Partisipasi Anda dalam Survei ini.</h3> <h5>SALAM SEHAT selalu dan INGAT PESAN IBU</h5> <h5>3M: MEMAKAI MASKER; MENCUCI TANGAN; MENJAGA JARAK</h5>",
        "title": "KUESIONER",
        "description": "SURVEI PERILAKU MASYARAKAT DI MASA PANDEMI",
        "logo": "../assets/js/surveygenerator/logoBPS.png",
        "logoWidth": 60,
        "logoHeight": 60,
        "pages": [{
            title: "Bagian A",
            questions: [{
                type: "matrix",
                name: "A1",
                title: "Manakah dari hal - hal berikut yang Anda lakukan dalam seminggu terakhir (terutama ketika sedang berada di luar rumah)",
                columns: [{
                    value: "Sangat Tidak Patuh",
                    text: "Sangat Tidak Patuh"
                }, {
                    value: "Sedikit Patuh",
                    text: "Sedikit Patuh"
                }, {
                    value: "Netral",
                    text: "Netral"
                }, {
                    value: "Patuh",
                    text: "Patuh"
                }, {
                    value: "Sangat Patuh",
                    text: "Sangat Patuh"
                }],
                rows: [{
                    value: "Memakai masker",
                    text: "Memakai masker"
                }, {
                    value: "Menggunakan hand sanitizer / disinfektan",
                    text: "Menggunakan hand sanitizer / disinfektan"
                }, {
                    value: "Mencuci tangan selama 20 detik dengan sabun",
                    text: "Mencuci tangan selama 20 detik dengan sabun"
                }, {
                    value: "Menghindari berjabat tangan",
                    text: "Menghindari berjabat tangan"
                }, {
                    value: "Menghindari kerumunan",
                    text: "Menghindari kerumunan"
                }, {
                    value: "Menjaga jarak (minimal 1 m) dari orang lain ketika di luar rumah",
                    text: "Menjaga jarak (minimal 1 m) dari orang lain ketika di luar rumah"
                }]
            }]
        }, {
            title: "Bagian B",
            questions: [{
                type: "matrix",
                name: "B2",
                title: "Seberapa efektifkah hal - hal berikut yang menurut anda dapat mencegah penyebaran Covid-19?",
                columns: [{
                    value: "Sangat Tidak Efektif",
                    text: "Sangat Tidak Efektif"
                }, {
                    value: "Sedikit Efektif",
                    text: "Sedikit Efektif"
                }, {
                    value: "Netral",
                    text: "Netral"
                }, {
                    value: "Efektif",
                    text: "Efektif"
                }, {
                    value: "Sangat Efektif",
                    text: "Sangat Efektif"
                }],
                rows: [{
                    value: "Memakai masker",
                    text: "Memakai masker"
                }, {
                    value: "Menggunakan hand sanitizer / disinfektan",
                    text: "Menggunakan hand sanitizer / disinfektan"
                }, {
                    value: "Mencuci tangan selama 20 detik dengan sabun",
                    text: "Mencuci tangan selama 20 detik dengan sabun"
                }, {
                    value: "Menghindari berjabat tangan",
                    text: "Menghindari berjabat tangan"
                }, {
                    value: "Menghindari kerumunan",
                    text: "Menghindari kerumunan"
                }, {
                    value: "Menjaga jarak (minimal 1 m) dari orang lain ketika di luar rumah",
                    text: "Menjaga jarak (minimal 1 m) dari orang lain ketika di luar rumah"
                }]
            }]
        },
        {
            title: "Bagian C",
            questions: [{
                type: "checkbox",
                name: "C1",
                title: "Menurut Anda, apa yang menyebabkan orang tidak menerapkan protokol kesehatan? (Pilihan bisa lebih dari satu)",
                colCount: 1,
                choices: [
                    "Harga masker, face-shield (pelindung wajah), hand sanitizer atau APD lain cenderung mahal",
                    "Pekerjaan menjadi sulit jika harus menerapkan protokol kesehatan",
                    "Aparat atau pimpinan tidak memberi contoh",
                    "Mengikuti orang lain",
                    "Tidak ada sanksi jika tidak menerapkan protokol kesehatan",
                    "Tidak ada kejadian penderita Covid-19 di lingkungan sekitar",
                ]
            }, {
                type: "radiogroup",
                name: "C2",
                title: "Jika ada orang yang Anda kenal terifeksi Covid-19, sepengatahuan Anda, bagaimana lingkungan sekitarnya merespon situasi tersebut? (Pilih yang paling utama)",
                colCount: 1,
                choices: [
                    "Orng dekat, tetangga dan lingkungannya memberi dukungan",
                    "Tidak ada respon (tidak melakukan apa-apa)",
                    "Mengucilkan (stigma negatif)",
                    "Protokol kesehatan dijalankan dengan ketat di lingkungan",
                    "Tidak ada/tidak punya pengalaman dengan orang dekat terinfeksi Covid-19",
                ]
            }, {
                type: "radiogroup",
                name: "C3",
                title: "Dibandingkan sebelum 1 Agustus 2020 (Adaptasi Kebiasaan Baru/New Normal), bagaimana frekuensi Anda keluar rumah atau ke tempat umum?",
                colCount: 1,
                choices: [
                    "Lebih sedikit",
                    "Sama",
                    "Lebih banyak",
                ]
            }, {
                type: "radiogroup",
                name: "C-Part-4",
                title: "Jika lebih banyak, untuk kepentingan apa yang lebih dominan?",
                visibleIf: "{C3}='Lebih banyak'",
                colCount: 1,
                choices: [
                    "Pekerjaan",
                    "Kebutuhan Sosial (Arisan,pengajian,belanja)",
                    "Leisure (jalan-jalan/wisata)",
                ]
            }]
        },
        {
            title: "Bagian D",
            questions: [{
                type: "matrix",
                name: "D1",
                title: "Seberapa efektifkah hal - hal berikut yang menurut anda dapat mencegah penyebaran Covid-19?",
                columns: [{
                    value: "Wajib jaga jarak",
                    text: "Wajib jaga jarak"
                }, {
                    value: "Cuci tangan",
                    text: "Sedikit Efektif"
                }, {
                    value: "Masker",
                    text: "Masker",
                }, {
                    value: "Diperiksa suhu",
                    text: "Diperiksa suhu",
                }, {
                    value: "Adanya penerapan 4 protokol tersebut",
                    text: "Adanya penerapan 4 protokol tersebut",
                }, {
                    value: "Tidak ada penerapan 4 protokol tersebut",
                    text: "Tidak ada penerapan 4 protokol tersebut",
                }, {
                    value: "Tidak mengunjungi tempat ini",
                    text: "Tidak mengunjungi tempat ini",
                }],
                rows: [{
                    value: "Tempat bekerja (Kantor, Pabrik, lainnya)",
                    text: "Tempat bekerja (Kantor, Pabrik, lainnya)"
                }, {
                    value: "Mall/Plaza/Pusat perbelanjaan",
                    text: "Mall/Plaza/Pusat perbelanjaan"
                }, {
                    value: "Pasar Tradisional & Pedagang K5",
                    text: "Pasar Tradisional & Pedagang K5"
                }, {
                    value: "Menghindari berjabat tangan",
                    text: "Menghindari berjabat tangan"
                }, {
                    value: "Tempat Ibadah",
                    text: "Tempat Ibadah"
                }, {
                    value: "Tempat Pelayanan Publik (Samsat, Bank, Kantor Pemerintahan dsb",
                    text: "Tempat Pelayanan Publik (Samsat, Bank, Kantor Pemerintahan dsb"
                }]
            }]
        },
        {
            title: "Bagian E",
            questions: [{
                type: "radiogroup",
                name: "E1",
                title: "Apakah sebulan terakhir Anda menggunakan angkutan umum?",
                colCount: 2,
                choices: [
                    "Ya",
                    "Tidak"
                ]
            }, {
                type: "radiogroup",
                name: "E2",
                title: "Dari pernyataan di atas, apa jenis angkutan umum yang paling banyak Anda gunakan?",
                visibleIf: "{E1}='Ya'",
                colCount: 1,
                choices: [
                    "Bus, Mikro Bus, Transportasi Air (Perahu)",
                    "Kereta, Commuter Line, MRT",
                    "Angkutan Kota, Angkutan Desa, Mikrolet, dsj",
                    "Ojek Online atau Ojek Pangkalan",
                    "Taksi Regular atau Taksi Online"
                ]
            }, {
                type: "checkbox",
                name: "E3",
                visibleIf: "{E2}='Bus, Mikro Bus, Transportasi Air (Perahu)' or {E2}='Kereta, Commuter Line, MRT' or {E2}='Angkutan Kota, Angkutan Desa, Mikrolet, dsj'",
                title: "Bagaimana penerapan protokol kesehatan pada moda transportasi tersebut?",
                colCount: 1,
                choices: [
                    "Sebagian besar penumpang menggunakan masker",
                    "Sebagian besar penumpang menjaga jarak",
                    "Pengemudi menggunakan masker",
                    "Tersedia pembatas antara pengemudi dan penumpang",
                    "Tidak ada pilihan jawaban di atas"
                ]
            }, {
                type: "checkbox",
                name: "E4a",
                visibleIf: "{E2}='Ojek Online atau Ojek Pangkalan'",
                title: "Bagaimana penerapan protokol kesehatan pada moda transportasi tersebut?",
                colCount: 1,
                choices: [
                    "Saya membawa helm milik sendiri",
                    "Pengemudi menggunakan masker",
                    "Tersedia pembatas antara pengemudi dan penumpang"
                ]
            }, {
                type: "checkbox",
                name: "E4b",
                visibleIf: "{E2}='Taksi Regular atau Taksi Online'",
                title: "Bagaimana penerapan protokol kesehatan pada moda transportasi tersebut?",
                colCount: 1,
                choices: [
                    "Pengemudi menggunakan masker",
                    "Tersedia pembatas antara pengemudi dan penumpang"
                ]
            }, {
                type: "radiogroup",
                name: "E5",
                title: "Dengan kondisi saat ini, bagaimana persepsi Anda tentang kemungkinan dapat terinfeksi atau tertular virus Corona?",
                colCount: 1,
                choices: [
                    "Sangat Tidak Mungkin",
                    "Tidak Mungkin",
                    "Cukup Mungkin",
                    "Mungkin",
                    "Sangat Mungkin",
                ]
            }]
        },
        {
            title: "Bagian F",
            questions: [{
                type: "checkbox",
                name: "F1",
                title: "Dari media apa saja Anda pernah mendapatkan informasi tentang pentingnya penerapan protokol kesehatan dan pentingnya mencegah penyebaran Covid - 19 ? (Pilihan bisa lebih dari satu)",
                hasNone: false,
                colCount: 1,
                choices: [
                    "Media Sosial(FB, IG, Twitter, Youtube, Tik - Tok)",
                    "Radio",
                    "Televisi",
                    "Surat Kabar, Majalah",
                    "Media Online(website)",
                    "Whatsapp",
                    "Jaringan aplikasi chat lainnya(Line, telegram, FB Messenger, Kaizala)",
                    "Rumah Ibadah(Masjid, Gereja, Pura, Vihara, Klenteng, Lainnya)",
                    "Tokoh Masyarakat(Ketua RT, RW, Masy Adat, Komunitas Sosial, Ormas)",
                    "Poster, Spanduk, Baliho",
                    "Pengumumam dari pemerintah setempat"
                ]
            }, {
                type: "checkbox",
                name: "F2",
                title: "Dari jawaban di atas, media apa yang paling memengaruhi Anda dalam menjalankan protokol kesehatan?",
                hasNone: false,
                colCount: 1,
                choices: [
                    "Media Sosial(FB, IG, Twitter, Youtube, Tik - Tok)",
                    "Radio",
                    "Televisi",
                    "Surat Kabar, Majalah",
                    "Media Online(website)",
                    "Whatsapp",
                    "Jaringan aplikasi chat lainnya(Line, telegram, FB Messenger, Kaizala)",
                    "Rumah Ibadah(Masjid, Gereja, Pura, Vihara, Klenteng, Lainnya)",
                    "Tokoh Masyarakat(Ketua RT, RW, Masy Adat, Komunitas Sosial, Ormas)",
                    "Poster, Spanduk, Baliho",
                    "Pengumumam dari pemerintah setempat"
                ]
            }]
        }, {
            title: "Bagian G",
            questions: [{
                type: "radiogroup",
                name: "G1",
                title: "Apakah jenis kelamin Anda?",
                colCount: 2,
                choices: [
                    "Laki - Laki",
                    "Perempuan"
                ]
            }, {
                name: "G2",
                type: "text",
                title: "Usia Anda saat ini ?",
                autoComplete: "age"
            }, {
                type: "radiogroup",
                name: "G3",
                title: "Ijazah terakhir yang Anda miliki ?",
                colCount: 1,
                choices: [
                    "SD",
                    "SMP",
                    "SMA/SMK",
                    "DI/DII/DIII",
                    "DIV/S1",
                    "S2/S3"
                ]
            }, {
                type: "radiogroup",
                name: "G4",
                title: "Apa status pernikahan Anda ?",
                colCount: 1,
                choices: [
                    "Belum menikah",
                    "Menikah",
                    "Cerai mati",
                    "Cerai hidup"
                ]
            }, {
                name: "G5",
                type: "text",
                title: "Berapa banyak orang yang tinggal di rumah tangga Anda ? (termasuk Anda)",
                autoComplete: "sumChild"
            }]
        }, {
            title: "Bagian H",
            questions: [{
                type: "radiogroup",
                name: "H1",
                title: "Apakah Anda bekerja?",
                colCount: 1,
                choices: [
                    "Ya, Bekerja",
                    "Ya, namun sementara sedang dirumahkan",
                    "Tidak, baru saja terkena PHK akibat kantor/tempat usaha tutup",
                    "Tidak Bekerja"
                ]
            }, {
                type: "radiogroup",
                name: "H2",
                title: "Apakah tempat kerja Anda menerapkan kegiatan bekerja dari rumah ( Work From Home /WFH)?",
                colCount: 1,
                visibleIf: "{H1} = 'Ya, Bekerja'",
                choices: [
                    "Ya, dan saya selalu bekerja dari rumah sejak ditetapkan",
                    "Ya, namun masih ada jadwal masuk kantor",
                    "Tidak menerapkan WFH, Masuk seperti biasa",
                    "Pekerjaan saya tidak memungkinkan WFH"
                ]
            }, {
                type: "radiogroup",
                name: "H3",
                title: "Dalam bidang apa Anda bekerja?",
                visibleIf: "{H1} = 'Ya, Bekerja'",
                colCount: 1,
                choices: [
                    "Pertanian, peternakan, kehutanan dan perikanan",
                    "Pertambangan dan penggalian(Migas, Mineral dan galian golongan C)",
                    "Industri pengolahan(termasuk industri rumah tangga yang memproduksi barang)",
                    "Konstruksi dan Bangunan",
                    "Listrik, Gas, dan Air Minum",
                    "Transportasi(darat, laut, dan udara)",
                    "Telekomunikasi(provider, penyedia layanan internet dan jasa pendukungnya)",
                    "Perdagangan(jika jual pulsa, token, dan sejenisnya)",
                    "Hotel dan Penginapan",
                    "Restoran, Rumah Makan, Warung, dan Penyediaan Makan Minum Lainnya",
                    "Pemerintahan dan Pertahanan(ASN, TNI dan POLRI)",
                    "Jasa - jasa(jasa pendidikan, sosial, dan jasa perorangan yang melayani ruta)",
                    "Bank, Asuransi, Pegadaian, dan Lembaga Keuangan Lainnya"
                ]
            }, {
                type: "radiogroup",
                name: "H4",
                title: "Dibandingkan awal pandemi dan PSBB (April-Juni), bagaimana perubahan pengeluaran saat ini ? ",
                colCount: 1,
                choices: [
                    "Meningkat",
                    "Tetap",
                    "Menurun"
                ]
            }, {
                type: "checkbox",
                name: "H5",
                title: "Selama masa pandemi ini, bantuan sosial apa saja yang pernah Anda terima dari pemerintah ? (Jawaban boleh lebih dari satu)",
                hasNone: false,
                colCount: 2,
                choices: [
                    "Uang Tunai(Bantuan Sosial Tunai)",
                    "Sembako",
                    "Pembebasan Tarif Listrik 450 VA atau Diskon Tarif Listrik 900 VA",
                    "Kartu Pekerja",
                    "Subsidi Gaji Karyawan",
                    "Bantuan Langsung Tunai Dana Desa",
                    "BLT Mikro Kecil",
                    "Tidak Pernah Menerima Bantuan"
                ]
            }]
        }, {
            title: "Bagian I",
            questions: [{
                name: "I1",
                type: "text",
                title: "Provinsi lokasi tempat tinggal Anda?",
                autoComplete: "province"
            }, {
                name: "I2",
                type: "text",
                title: "Kabupaten/kota manakah biasanya Anda tinggal?",
                autoComplete: "city"
            }, {
                type: "radiogroup",
                name: "I3",
                title: "Untuk memonitor perubahan perilaku di lingkungan Anda tentang protokol kesehatan di masa pandemi, bersediakan Anda menjadi responden survei ini kembali 1 bulan kedepan ? ",
                colCount: 2,
                choices: [
                    "Ya, Saya bersedia",
                    "Tidak Bersedia"
                ]
            }, {
                name: "I4",
                type: "text",
                title: "Jika Anda bersedia, tuliskan nomor Hp atau WA atau alamat email yang aktif untuk diberikan Link Survei berikutnya bulan depan.Kami menjamin kerahasiaan identitas Anda.",
                autoComplete: "idPersonal"
            }]
        }
        ]

    };

    window.survey = new Survey.Model(json);

    survey.onComplete.add(function (sender) {
        $.ajax({
            method: 'POST',
            url: 'php/insertdataKuisioner.php',
            data: {
                task: 'insertKuisioner',
                hasilKuis: JSON.stringify(sender.data, null, 3)
            },
            success: function (response) {
                if (response == "Sukses") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Data telah disimpan, Mohon Tunggu',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: response,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
    });

    survey.render("surveyElement");

    function animate(animitionType, duration) {
        if (!duration)
            duration = 1000;
        var element = document.getElementById("surveyElement");
        $(element).velocity(animitionType, { duration: duration });
    }

    var doAnimantion = true;
    survey
        .onCurrentPageChanging
        .add(function (sender, options) {
            if (!doAnimantion)
                return;
            options.allowChanging = false;
            setTimeout(function () {
                doAnimantion = false;
                sender.currentPage = options.newCurrentPage;
                doAnimantion = true;
            }, 500);
            animate("slideUp", 500);
        });
    survey
        .onCurrentPageChanged
        .add(function (sender) {
            animate("slideDown", 500);
        });
    survey
        .onCompleting
        .add(function (sender, options) {
            if (!doAnimantion)
                return;
            options.allowComplete = false;
            setTimeout(function () {
                doAnimantion = false;
                sender.doComplete();
                doAnimantion = true;
            }, 500);
            animate("slideUp", 500);
        });
    animate("slideDown", 1000);
}