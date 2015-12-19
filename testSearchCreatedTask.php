 <?php

 /**@author Mohammed Dahir Abdulmumini
  *@ 18/12/2015
  * Php Unit Test
  */

 class searchCreatedTaskModelTest extends PHPUnit_Framework_TestCase
  {
    
  /**
   * @test test search a created task
   */
      public function user_search_created_task ( $search_text, $user_id )
      {
          include("implementationThree-SearchCreatedTaskModel.php");
          $obj = new searchCreatedTaskModelTest();
          $this->assertTrue(true);
          return $obj->user_search_created_task ( $search_text, $user_id );
   
      }

  }
  ?>