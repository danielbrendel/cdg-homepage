<?php

/*
    Asatru PHP - Example controller

    Add here all your needed routes implementations related to 'index'.
*/

/**
 * Example index controller
 */
class IndexController extends BaseController {
	/**
	 * Handles URL: /
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function index($request)
	{
		//Generate and return a view by using the helper
		return view('layout', array(array('content', 'index')));
	}

	/**
	 * Handles URL: /news
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function news($request)
	{
		//Generate and return a view by using the helper
		return view('layout', array(
			array('content', 'news/news'), 
			array('javascript', 'news/js'))
		);
	}

	/**
	 * Handles URL: /news/query
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\JsonHandler
	 */
	public function queryNews($request)
	{
		try {
			$fromStart = $request->params()->query('from', 0);
			$data = News::query($fromStart);

			return json([
				'code' => 200,
				'data' => (array)$data
			]);
		} catch (Exception $e) {
			return json([
				'code' => 500,
				'msg' => $e->getMessage()
			]);
		}
	}

	/**
	 * Handles URL: /download
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function download($request)
	{
		//Generate and return a view by using the helper
		return view('layout', array(array('content', 'download')), [
			'versions' => [
			]
		]);
	}

	/**
	 * Handles URL: /screenshots
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function screenshots($request)
	{
		//Generate and return a view by using the helper
		return view('layout', array(
			array('content', 'screenshots/screenshots'),
			array('javascript', 'screenshots/js')
		));
	}

	/**
	 * Handles URL: /screenshots/query/steam
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\JsonHandler
	 */
	public function querySteamScreenshots($request)
	{
		try {
			$sorting = $request->params()->query('sorting', 'top');

            $data = Screenshots::querySteamScreenshots($sorting, env('APP_SCREENSHOTLIMIT'));

            return json([
				'code' => 200,
				'data' => (array)$data]
			);
		} catch (Exception $e) {
			return json([
				'code' => 500,
				'msg' => $e->getMessage()
			]);
		}
	}

	/**
	 * Handles URL: /api
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function api($request)
	{
		//Aquire API content
		$pd = new \Parsedown();
        $markdown = $pd->text(file_get_contents(public_path() . '/api.md'));

		//Generate and return a view by using the helper
		return view('layout', array(array('content', 'api')), [
			'documentation' => $markdown
		]);
	}
}
