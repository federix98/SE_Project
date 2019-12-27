
DB::table('lessons')->where('lessons.id','<','5')->get();

->join('buildings','classrooms.class_id','buildings.id')

DB::table('lessons')->where('lessons.id','<','5')->select('lessons.*','classrooms.name as class_name','classrooms.building_id','buildings.name')->join('classrooms','lessons.classroom_id','classrooms.id')->join('buildings','classrooms.building_id','buildings.id')->get();


$start = new \Carbon\Carbon($r->start_date);
$date = $start->addDays($i);