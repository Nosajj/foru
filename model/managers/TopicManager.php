<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\TopicManager;

    class TopicManager extends Manager{

        protected $className = "Model\Entities\Topic";
        protected $tableName = "topic";


        public function __construct(){
            parent::connect();
        }

        public function findTopicsByCategory($id){

            $sql = ("SELECT t.id_topic , t.title , t.creationdate , t.category_id , t.user_id
            FROM topic t 
            INNER JOIN category c ON t.category_id = c.id_category
            WHERE t.category_id = :id");
            
            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id], true), 
                $this->className
            );
    }
}