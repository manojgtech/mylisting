<?php

namespace App\Admin\Controllers;

use App\Models\city;
use App\Models\state;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CityController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'city';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new city());

        $grid->column('id', __('Id'));
        $grid->column('city', __('City'))->filter('like');
        $grid->column('state.name')->filter('like');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(city::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('city', __('City'));
        $show->field('state_id', __('State id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new city());

        $form->text('city', __('City'));
        $form->number('state_id', __('State id'));

        return $form;
    }
}
