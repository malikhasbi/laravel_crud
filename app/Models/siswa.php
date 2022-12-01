<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $fillable = ['nis', 'nama', 'ttl', 'kelas', 'jurusan', 'image'];
    protected $table = 'siswa';
    public $timestamps = false;
    function image($real_size = false)
    {
        $thumbnail = $real_size ? '' : 'small_';

        if ($this->image && file_exists(public_path('images/post/' . $thumbnail . $this->image)))
            return asset('images/post/' . $thumbnail  . $this->image);
        else
            return asset('images/no_image.png');
    }

    function delete_image()
    {
        if ($this->image && file_exists(public_path('images/post/' . $this->image)))
            unlink(public_path('images/post/' . $this->image));
        if ($this->image && file_exists(public_path('images/post/small_' . $this->image)))
            unlink(public_path('images/post/small_' . $this->image));
    }
}