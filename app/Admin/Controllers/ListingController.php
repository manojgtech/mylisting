<?php

namespace App\Admin\Controllers;

use App\Models\listing;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ListingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'listing';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new listing());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('title', __('Title'));
        $grid->column('slug', __('Slug'));
        $grid->column('category', __('Category'));
        $grid->column('location', __('Location'));
        $grid->column('city', __('City'));
        $grid->column('state', __('State'));
        $grid->column('zip', __('Zip'));
        $grid->column('price', __('Price'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        $grid->column('website', __('Website'));
        $grid->column('description', __('Description'));
        $grid->column('created_at', __('Created at'));
        $grid->column('twitter', __('Twitter'));
        $grid->column('facebook', __('Facebook'));
        $grid->column('instagram', __('Instagram'));
        $grid->column('youtube', __('Youtube'));
        $grid->column('featured', __('Featured'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(listing::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('title', __('Title'));
        $show->field('slug', __('Slug'));
        $show->field('category', __('Category'));
        $show->field('location', __('Location'));
        $show->field('city', __('City'));
        $show->field('state', __('State'));
        $show->field('zip', __('Zip'));
        $show->field('price', __('Price'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('website', __('Website'));
        $show->field('description', __('Description'));
        $show->field('created_at', __('Created at'));
        $show->field('twitter', __('Twitter'));
        $show->field('facebook', __('Facebook'));
        $show->field('instagram', __('Instagram'));
        $show->field('youtube', __('Youtube'));
        $show->field('featured', __('Featured'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new listing());

        $form->number('user_id', __('User id'));
        $form->text('title', __('Title'));
        $form->text('slug', __('Slug'));
        $form->number('category', __('Category'));
        $form->text('location', __('Location'));
        $form->number('city', __('City'));
        $form->number('state', __('State'));
        $form->text('zip', __('Zip'));
        $form->text('price', __('Price'));
        $form->email('email', __('Email'));
        $form->mobile('phone', __('Phone'));
        $form->text('website', __('Website'));
        $form->textarea('description', __('Description'));
        $form->text('twitter', __('Twitter'));
        $form->text('facebook', __('Facebook'));
        $form->text('instagram', __('Instagram'));
        $form->text('youtube', __('Youtube'));
        $form->switch('featured', __('Featured'));

        return $form;
    }
}
