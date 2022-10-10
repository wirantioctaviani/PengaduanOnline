<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstrPengaduan extends Model
{
    use HasFactory;
    protected $table = 'mstr_pengaduan';
    protected  $primaryKey = 'id';
    protected $fillable = ['no_tiket', 'nama_pelapor','telp_pelapor', 'email_pelapor', 'oranglayanan_terlapor', 'satuan_kerja', 'waktu_kejadian', 'tempat_kejadian', 'judul_pelanggaran', 'detail_pelanggaran', 'status_pengaduan','pic_bidang', 'created_at', 'updated_at'];

    public function setCategoryAttribute($value)
    {
        $this->attributes['pic_bidang'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['pic_bidang'] = json_decode($value);
    }
}
