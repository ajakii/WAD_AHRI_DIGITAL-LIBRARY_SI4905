<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Pengaduan extends Model
{
protected $table = 'pengaduan';

const UPDATED_AT = null;

protected $fillable = ['nama', 'email', 'kategori', 'deskripsi', 'status'];
}
