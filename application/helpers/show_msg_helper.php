<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function show_msg($content='', $type='success', $icon='fa-info-circle', $size='14px')
{
    if ($content != '') {
        return  '<p class="box-msg">
          <div class="info-box alert-' .$type .'">
          <div class="info-box-icon">
          <i class="fa ' .$icon .'"></i>
          </div>
          <div class="info-box-content" style="font-size:' .$size .'">
          ' .$content
          .'</div>
          </div>
          </p>';
    }
}

function show_succ_msg($content='', $size='14px')
{
    if ($content != '') {
        return   '<p class="box-msg">
          <div class="info-box alert-success">
          <div class="info-box-icon">
          <i class="fa fa-check-circle"></i>
          </div>
          <div class="info-box-content" style="font-size:' .$size .'">
          <b style="font-size: 20px">SUKSES</b><br> ' .$content
          .'</div>
          </div>
          </p>';
    }
}

function show_err_msg($content='', $size='14px')
{
    if ($content != '') {
        return   '<p class="box-msg">
          <div class="info-box alert-error">
          <div class="info-box-icon">
          <i class="fa fa-warning"></i>
          </div>
          <div class="info-box-content" style="font-size:' .$size .'">
          ' .$content
          .'</div>
          </div>
          </p>';
    }
}

function show_err_form_msg($content='', $size='14px')
{
    if ($content != '') {
        return   '<div class="box-body" style="text-align:center">
          <div class="alert alert-danger alert-dismissible">'
          .$content.
          '</div>
          </div>';
    }
}

function alert($class, $title, $description)
{
    return '<div class="alert '.$class.' alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i> '.$title.'</h4>
      '.$description.'
      </div>';
}