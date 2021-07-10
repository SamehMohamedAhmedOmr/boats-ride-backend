<?php

namespace Modules\Yacht\Entities;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimeSlot extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function scopeAvailableInYachtTrips($query, $date, $yacht)
    {
        return $query->whereExists(function ($query) use($date, $yacht){
            $query->select(DB::raw('1'))
                  ->from('trips')
                  ->where('yacht_id',$yacht)
                  ->where('start_date',$date)
                  ->where(function($query){
                      $query->whereColumn('trips.start_hour','>','time_slots.time')
                            ->orwhereColumn('trips.end_hour','<','time_slots.time');
                  });
        })->orWhereRaw('( select COUNT(*) from `trips` where `yacht_id` = ? and `start_date` = ? ) = 0',[$yacht,$date]);
    }  
    
    public function scopeNotAvailableInYachtTrips($query, $date, $yacht)
    {
        return $query->whereExists(function ($query) use($date, $yacht){
            $query->select(DB::raw('1'))
                  ->from('trips')
                  ->where('yacht_id',$yacht)
                  ->where('start_date',$date)
                  ->where(function($query){
                      $query->whereColumn('trips.start_hour','<=','time_slots.time')
                            ->whereColumn('trips.end_hour','>=','time_slots.time');
                  });
        });
    }
    
    
    // water sports scopes

    public function scopeAvailableInWaterSportTrips($query, $date, $water_sport)
    {
        return $query->whereExists(function ($query) use($date, $water_sport){
            $query->select(DB::raw('1'))
                  ->from('water_sport_trips')
                  ->where('water_sport_id',$water_sport)
                  ->where('start_date',$date)
                  ->where(function($query){
                      $query->whereColumn('water_sport_trips.start_hour','>','time_slots.time')
                            ->orwhereColumn('water_sport_trips.end_hour','<','time_slots.time');
                  });
        })->orWhereRaw('( select COUNT(*) from `water_sport_trips` where `water_sport_id` = ? and `start_date` = ? ) = 0',[$water_sport,$date]);
    }  
    
    public function scopeNotAvailableInWaterSportTrips($query, $date, $water_sport)
    {
        return $query->whereExists(function ($query) use($date, $water_sport){
            $query->select(DB::raw('1'))
                  ->from('water_sport_trips')
                  ->where('water_sport_id',$water_sport)
                  ->where('start_date',$date)
                  ->where(function($query){
                      $query->whereColumn('water_sport_trips.start_hour','<=','time_slots.time')
                            ->whereColumn('water_sport_trips.end_hour','>=','time_slots.time');
                  });
        });
    }
}
