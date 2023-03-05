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
		return view('layout', array(array('content', 'index')), [
			'show_header' => true,
			'reviews' => ReviewsModel::getAllReviews()
		]);
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
			array('javascript', 'news/js')),
			[
				'page_title' => 'News'
			]
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
			$data = SteamModule::queryNews($fromStart);

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
			'page_title' => 'Download the game',
			'workshop_items' => config('workshop_items')
		]);
	}

	/**
	 * Handles URL: /tools
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\ViewHandler
	 */
	public function tools($request)
	{
		//Generate and return a view by using the helper
		return view('layout', array(array('content', 'tools')), ['page_title' => 'Official tools list']);
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
		), [
			'page_title' => 'Screenshots'
		]);
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

            $data = SteamModule::queryScreenshots($sorting, env('APP_SCREENSHOTLIMIT'));

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
	 * Handles URL: /screenshots/query
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\JsonHandler
	 */
	public function queryDbScreenshots($request)
	{
		try {
			$from = $request->params()->query('screenIndex', null);

            $data = ScreenshotModel::query($from);

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
	 * Handles URL: /cdg/uploadScreenshot
	 */
	public function uploadScreenshot($request)
	{
		GameScreenModel::store();

		exit(200);
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
			'page_title' => 'Application programming interface',
			'documentation' => $markdown
		]);
	}

	/**
	 * Handles URL: /cronjob/gamescreens/{pw}
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\JsonHandler
	 */
	public function cronjob_gamescreens($request)
	{
		try {
			$pw = $request->arg('pw', null);

			if (!env('TWITTERBOT_ENABLE', false)) {
                throw new Exception('Twitter Bot is deactivated', 500);
            }

            if ($pw !== env('TWITTERBOT_CRONPW')) {
                throw new Exception('Password ' . $pw . ' is invalid', 403);
            }

			GameScreenModel::twitterCronPost();

			return json([
				'code' => 200
			]);
		} catch (Exception $e) {
			return json([
				'code' => $e->getCode(),
				'msg' => $e->getMessage()
			]);
		}
	}

	/**
	 * Handles URL: /cronjob/steamscreens/{pw}
	 * 
	 * @param Asatru\Controller\ControllerArg $request
	 * @return Asatru\View\JsonHandler
	 */
	public function cronjob_steamscreens($request)
	{
		try {
			$pw = $request->arg('pw', null);

			if (!env('TWITTERBOT_ENABLE', false)) {
                throw new Exception('Twitter Bot is deactivated', 500);
            }

            if ($pw !== env('TWITTERBOT_CRONPW')) {
                throw new Exception('Password ' . $pw . ' is invalid', 403);
            }

			SteamScreenModel::acquireAndPost();

			return json([
				'code' => 200
			]);
		} catch (Exception $e) {
			return json([
				'code' => $e->getCode(),
				'msg' => $e->getMessage()
			]);
		}
	}
}
