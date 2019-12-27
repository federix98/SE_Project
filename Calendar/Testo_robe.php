
DB::table('lessons')->where('lessons.id','<','5')->get();

->join('buildings','classrooms.class_id','buildings.id')

DB::table('lessons')->where('lessons.id','<','5')->select('lessons.*','classrooms.name as class_name','classrooms.building_id','buildings.name')->join('classrooms','lessons.classroom_id','classrooms.id')->join('buildings','classrooms.building_id','buildings.id')->get();


$start = new \Carbon\Carbon($r->start_date);
$date = $start->addDays($i);

$users = Users::where('status_id', 'active')
->where( 'created_at', '>', Carbon::now()->subDays(30))
->get();



DB::table('lessons')->whereDate('lessons.start_date', '<', Carbon\Carbon::today()->addDays(5))->whereDate('lessons.end_date', '>', Carbon\Carbon::today()->subDays(5))->select( 'lessons.id as lesson_id', 'lessons.teaching_id', 'lessons.classroom_id', 'lessons.week_day', 'canceled_lessons.id as canceled', 'lessons.start_time', 'lessons.duration', 'classrooms.name as classroom_name', 'teachings.name as teaching_name')->leftJoin('canceled_lessons', 'lessons.id', 'canceled_lessons.lesson_id')->join('classrooms', 'lessons.classroom_id', '=', 'classrooms.id')->join('teachings', 'lessons.teaching_id', '=', 'teachings.id')->get();