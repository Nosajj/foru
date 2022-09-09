<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\CategoryManager;
    use Model\Managers\PostManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
          

            $categoryManager = new CategoryManager();
            $topicManager = new TopicManager();
            $postManager = new PostManager();
 
             return [
                 "view" => VIEW_DIR."forum/listCategories.php",
                 "data" => [
                     "categories" => $categoryManager->findAll(["categoryName", "DESC"]),
                     
                     
                 ]
             ];
         
         }

         public function detailsCategory($id){
          

            $categoryManager = new CategoryManager();
            $topicManager = new TopicManager();
            // $postManager = new PostManager();
 
             return [
                 "view" => VIEW_DIR."forum/detailsCategory.php",
                 "data" => [
                    "category" => $categoryManager->findOneById($id),
                     "topics" => $topicManager->findTopicsByCategory($id),
                     
                     
                 ]
             ];
         
         }

         public function detailsTopic($id){

            $topicManager = new TopicManager();
            $postManager = new PostManager();

            return [
                "view" => VIEW_DIR."forum/detailsTopic.php",
                "data" => [
                   "topics" => $topicManager->findOneById($id),
                    "posts" => $postManager->findPostsByTopic($id),
                    
                    
                ]
            ];
         }

        

    }

    // Faire une entities category , manager category et la table sql (clé etrangere a rajouter dans topic)
