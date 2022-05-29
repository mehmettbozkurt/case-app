<?php

namespace App\Console\Commands;
use App\Interfaces\TaskRepositoryInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Ixudra\Curl\Facades\Curl;

class TaskCreate extends Command
{
    public $providers = [

        [
            "provider_name" => "Provider 1",
            "url" => "http://www.mocky.io/v2/5d47f24c330000623fa3ebfa",
            "defines" => array("title" => "id", "time" => "sure", "difficulty" => "zorluk")
        ],
        [
            "provider_name" => "Provider 2",
            "url" => "http://www.mocky.io/v2/5d47f235330000623fa3ebf7",
            "defines" => array("title" => [],"time" => "estimated_duration", "difficulty" => "level")
        ],


    ];
    /**
     * @var object
     */
    public $taskRepository;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch task from API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        parent::__construct();
        $this->taskRepository = $taskRepository;
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */



    public function handle()
    {

        $providers = $this->providers;
        $data = [];
        foreach ($providers as $provider) {

            $url = $provider["url"];
            $defines = $provider["defines"];
            $title = $defines["title"];
            $time = $defines["time"];
            $difficulty = $defines["difficulty"];
            $provider_responses = $this->getDataToApi($url);
            foreach ($provider_responses as $provider_response) {

                if (is_array($title)) {
                    foreach ($provider_response as $key => $response) {

                        $result = $this->createTaskArray($key, $response[$time], $response[$difficulty]);
                        $data[] = $result;
                    }

                } else {
                    $result = $this->createTaskArray($provider_response[$title], $provider_response[$time], $provider_response[$difficulty]);
                    $data[] = $result;

                }
            }
        }

        $this->taskRepository->saveTasks($data);
        $this->info("Tasks Saved Successfully.");

    }
    public function createTaskArray($name, $estimated_duration, $level)
    {
        $temp_data = [
            "name" =>$name,
            "estimated_duration" => $estimated_duration,
            "level" => $level,
        ];
        return $temp_data;
    }


    private function getDataToApi($url)
    {
        $response = Http::get($url);
        $response = $response->json();
        return $response;
    }


}
