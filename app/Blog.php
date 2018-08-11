<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	protected $table = 'blog';
	
	protected $fillable = [
        'title','description', 'created_by',
    ];
	
	public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
	
	/**
	*@purpose: To Store blog data
	*/
	public function storeBlog($data){
		$this->created_by = auth()->user()->id;
        $this->title = $data['title'];
        $this->description = $data['description'];
        return $this->save();
	}
	
	public function updateTicket($data)
	{
        $ticket = $this->find($data['id']);
        $ticket->user_id = auth()->user()->id;
        $ticket->title = $data['title'];
        $ticket->description = $data['description'];
        return $ticket->save();
	}
}
