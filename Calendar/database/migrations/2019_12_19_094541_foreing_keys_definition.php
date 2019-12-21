<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeingKeysDefinition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table0) {
            $table0->foreign('user_role_id')->references('id')
            ->on('user_roles')->onDelete('set null'); });

        Schema::table('users', function(Blueprint $table1) {
            $table1->foreign('degree_id')->references('id')
            ->on('degrees')->onDelete('set null'); });

        Schema::table('classrooms', function(Blueprint $table2) {
            $table2->foreign('building_id')->references('id')
            ->on('buildings')->onDelete('set null'); });

        Schema::table('degrees', function(Blueprint $table3) {
            $table3->foreign('degree_group_id')->references('id')
            ->on('degree_groups')->onDelete('set null'); });

        Schema::table('professors', function(Blueprint $table4) {
            $table4->foreign('professor_role_id')->references('id')
            ->on('professor_roles')->onDelete('set null'); });

        Schema::table('professors', function(Blueprint $table5) {
            $table5->foreign('department_id')->references('id')
            ->on('departments')->onDelete('set null'); });

        Schema::table('degree_groups', function(Blueprint $table6) {
            $table6->foreign('department_id')->references('id')
            ->on('departments')->onDelete('set null'); });

        Schema::table('lessons', function(Blueprint $table7) {
            $table7->foreign('classroom_id')->references('id')
            ->on('classrooms')->onDelete('set null'); });

        Schema::table('lessons', function(Blueprint $table8) {
            $table8->foreign('teaching_id')->references('id')
            ->on('teachings')->onDelete('set null'); });

        Schema::table('canceled_lessons', function(Blueprint $table9) {
            $table9->foreign('lesson_id')->references('id')
            ->on('lessons')->onDelete('set null'); });

        Schema::table('extra_lessons', function(Blueprint $table10) {
            $table10->foreign('classroom_id')->references('id')
            ->on('classrooms')->onDelete('set null'); });

        Schema::table('extra_lessons', function(Blueprint $table11) {
            $table11->foreign('teaching_id')->references('id')
            ->on('teachings')->onDelete('set null'); });

        Schema::table('updates', function(Blueprint $table12) {
            $table12->foreign('teaching_id')->references('id')
            ->on('teachings')->onDelete('set null'); });

        Schema::table('degree_teaching', function(Blueprint $table13) {
            $table13->foreign('degree_id')->references('id')
            ->on('degrees')->onDelete('set null'); });

        Schema::table('degree_teaching', function(Blueprint $table14) {
            $table14->foreign('teaching_id')->references('id')
            ->on('teachings')->onDelete('set null'); });

        Schema::table('degree_teaching', function(Blueprint $table15) {
            $table15->foreign('teaching_type_id')->references('id')
            ->on('teaching_types')->onDelete('set null'); });

        Schema::table('teaching_user', function(Blueprint $table16) {
            $table16->foreign('user_id')->references('id')
            ->on('users')->onDelete('set null'); });

        Schema::table('teaching_user', function(Blueprint $table17) {
            $table17->foreign('teaching_id')->references('id')
            ->on('teachings')->onDelete('set null'); });

        Schema::table('professor_teaching', function(Blueprint $table18) {
            $table18->foreign('professor_id')->references('id')
            ->on('professors')->onDelete('set null'); });

        Schema::table('professor_teaching', function(Blueprint $table19) {
            $table19->foreign('teaching_id')->references('id')
            ->on('teachings')->onDelete('set null'); });

        Schema::table('degree_special_event', function(Blueprint $table20) {
            $table20->foreign('degree_id')->references('id')
            ->on('degrees')->onDelete('set null'); });

        Schema::table('degree_special_event', function(Blueprint $table21) {
            $table21->foreign('special_event_id')->references('id')
            ->on('special_events')->onDelete('set null'); });
            
        Schema::table('special_events', function(Blueprint $table22) {
            $table22->foreign('classroom_id')->references('id')
            ->on('classrooms')->onDelete('set null'); });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table0->dropForeign(['user_role_id']);
        $table1->dropForeign(['degree_id']);
        $table2->dropForeign(['building_id']);
        $table3->dropForeign(['degree_group_id']);
        $table4->dropForeign(['professor_role_id']);
        $table5->dropForeign(['department_id']);
        $table6->dropForeign(['department_id']);
        $table7->dropForeign(['classroom_id']);
        $table8->dropForeign(['teaching_id']);
        $table9->dropForeign(['lesson_id']);
        $table10->dropForeign(['classroom_id']);
        $table11->dropForeign(['teaching_id']);
        $table12->dropForeign(['teaching_id']);
        $table13->dropForeign(['degree_id']);
        $table14->dropForeign(['teaching_id']);
        $table15->dropForeign(['teaching_type_id']);
        $table16->dropForeign(['user_id']);
        $table17->dropForeign(['teaching_id']);
        $table18->dropForeign(['professor_id']);
        $table19->dropForeign(['teaching_id']);
        $table20->dropForeign(['degree_id']);
        $table21->dropForeign(['special_event_id']);
        $table22->dropForeign(['classroom_id']); 
    }
}
