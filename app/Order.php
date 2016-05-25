<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use DB;

class Order extends Model
{
    use SluggableTrait;

    public $table = "orders";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'type',
        'room',
        'time',
        'name',
        'email',
        'description',
        'card_number',
        'total_summ',
        'agree',
        'user_id',
        'number',
        'user_id',
        'phone',
        'is_paid',
        'str_text',
    ];

    protected $sluggable = [
        'build_from' => ['name'],
        'save_to' => 'slug',
    ];

    /*public function season()
    {
        $this->numberValidation();
        return $this->belongsTo('App\Season');
    }

    public function serial()
    {
        return $this->belongsTo('App\Serial');
    }*/


    /**
     * Validation rules
     */
    public static $rules = array(
        'name' => 'required',
        'description' => 'required',
        'phone' => 'required'
    );

    /*
    * Unique number for current season_id
    */
    /*private function numberValidation()
    {
        if (isset($_POST['season'])) {
            static::$rules['number'] = 'required|integer|unique:epizodes,number,NULL,id,season_id,' . $_POST['season'];
        }
    }
*/
    public static function boot()
    {
        parent::boot();

        static::updating(function ($post) {

            if ($post->is_paid == 1) {

                DB::table('times')
                    ->where('order_id', $post->id)
                    ->update(array('is_paid' => 1));
            } else {
                DB::table('times')
                    ->where('order_id', $post->id)
                    ->update(array('is_paid' => 0));
            }

        });
    }

}
