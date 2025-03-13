<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("CREATE DEFINER=`marc`@`localhost` PROCEDURE `ShowAllTableDescriptions`()
BEGIN
    DECLARE done INT DEFAULT 0;
    DECLARE tbl_name VARCHAR(64);
    DECLARE cur CURSOR FOR 
        SELECT table_name FROM information_schema.tables 
        WHERE table_schema = DATABASE();
    
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

    OPEN cur;
    
    read_loop: LOOP
        FETCH cur INTO tbl_name;
        IF done THEN
            LEAVE read_loop;
        END IF;
        
        
        SELECT CONCAT('Table: ', tbl_name) AS Table_Name;
        
        
        SET @query = CONCAT('SHOW COLUMNS FROM ', tbl_name);
        PREPARE stmt FROM @query;
        EXECUTE stmt;
        DEALLOCATE PREPARE stmt;
        
    END LOOP;

    CLOSE cur;
END");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS ShowAllTableDescriptions");
    }
};
