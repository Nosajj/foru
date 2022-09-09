<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\PostManager;

    class PostManager extends Manager{

        protected $className = "Model\Entities\Post";
        protected $tableName = "post";


        public function __construct(){
            parent::connect();
        }

        public function findPostsByTopic($id){

            $sql = ("SELECT p.id_post , p.text , p.creationdate , p.topic_id, p.user_id
            FROM post p
            INNER JOIN topic t ON p.topic_id = t.id_topic
            WHERE p.id_post = :id");
            
            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id], true), 
                $this->className
            );

        


    }
}