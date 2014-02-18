<?php

/**
 * Description of ColourController
 *
 * @author user1
 */
class ColourController extends BaseController {

    public function index() {
        return View::make('colour.index', array('colours' => Colour::all()));
    }

    public function postColour() {
        $v = Colour::validate(Input::all());
        if ($v->passes()) {
            Colour::create(Input::all());
            return Redirect::to('colours');
        } else {
            Input::flash();
            return Redirect::to('colours')->withErrors($v);
        }
    }

    public function deleteColour($id) {
        Colour::destroy($id);
        return Redirect::to('colours');
    }

}
