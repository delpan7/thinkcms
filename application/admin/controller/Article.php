<?php
namespace app\admin\controller;

class Article extends Base
{

    private $model;

    private $model_info;

    protected function initialize()
    {
        parent::initialize();
        //当前模型
        $model_id = $this->request->request('model_id', 1, 'int');
        
        $this->model_info = model('Model')->find($model_id);
        if($this->model_info['base_table']){
            $this->model = model('Document');
        }elseif($this->model_info['mark']){
            $this->model = model(ucfirst($this->model_info['mark']));
        }else{
            $this->error('模型参数错误');
        }
    }

    public function index()
    {
        $list = $this->model->where('status',1)->paginate(10);
        
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        // 渲染模板输出
        // $this->view->engine->layout(false);
        // var_dump($this->view);exit;
        // if ($this->request->isAjax()){
            // $this->view->engine->layout(false);
            // return $this->fetch('index');
        // }else{
            return $this->fetch();
        }
        
        // return $this->display();
    }

    public function add()
    {
        model('Field')->find($model_id);
        return $this->fetch();
    }

    public function doAdd()
    {
    }

    public function edit($id)
    {
        return $this->fetch();
    }

    public function doEdit()
    {
    }

    public function delete()
    {
    }
}
