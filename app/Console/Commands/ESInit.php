<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;

class ESInit extends Command
{
    /**
     * The name and signature of the console command.
     * 代表使用什么命令来启动脚本
     * @var string
     */
    protected $signature = 'es:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'init laravel es for post';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * 实际这个命令要做的事
     * @return mixed
     */
    public function handle()
    {
/* 
        // 创建template  ,
        // "elasticquent/elasticquent": "dev-master"
        //$client = new \GuzzleHttp\Client(['base_uri' => 'http://127.0.0.1:9200']);
        $client = new \GuzzleHttp\Client();
        // 此处的('scout.elasticsearch.hosts')[0] 对应为 \config\scout.php 中的
        // elasticsearch中的hosts 中的第一个[0]，也就是env('ELASTICSEARCH_HOST', 'http://')
        $url = config('scout.elasticsearch.hosts')[0] . '/_template/tmp';
        //$client->
        var_dump($client->delete($url));
        // 创建模板
        $param = [
            'json' => [
                // 对定义好的索引起作用
                'template' => config('scout.elasticsearch.index'),
                'mappings' => [
                    '_default_' => [
                        'dynamic_templates' => [
                            [
                                'strings' => [
                                    // 将输入string 解析为text
                                    'match_mapping_type' => 'string',
                                    'mapping' => [
                                        'type' => 'text',
                                        // 使用ik_smart 进行文本分析
                                        'analyzer' => 'ik_smart',
                                        'fields' => [
                                            'keyword' => [
                                                'type' => 'keyword',
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $client->put($url, $param);

        $this->info("======================= Create template success ========================");

        // 创建index
        $url = config('scout.elasticsearch.hosts')[0] . '/' . config('scout.elasticsearch.index');
        $client->delete($url);
        $param = [
            'json' => [
                'settings' => [
                    // 设置ES更新时间
                    'refresh_interval' => '5s',
                    'number_of_shards' => 1,
                    'number_of_replicas' => 0,
                ],
                'mappings' => [
                    '_default_' => [
                        // 设置下划线all 是否显示
                        '_all' => [
                            'enabled' => false
                        ]
                    ]
                ]
            ],
        ];
        $client->put($url, $param);

        $this->info("======================= Create index success ========================");
         */
    }
}
