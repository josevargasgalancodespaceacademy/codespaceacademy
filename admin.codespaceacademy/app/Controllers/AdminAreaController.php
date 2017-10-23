<?php

namespace App\Controllers;

use Slim\Views\Twig as View;
use Illuminate\Database\Capsule\Manager as DB;
use App\Auth\Auth as Auth;

use App\Models\NewsletterSubscriber;
use App\Models\CompanyContact;
use App\Models\Curriculum;
use App\Models\PromotionEntry;

class AdminAreaController extends Controller
{

	/**
	 * Finds the active model for the current route and sets it to the controller instance
	 *
	 * @param {string} $requestPage
	 * @return void
	 */


	private function selectActiveModel($requestPage)
	{
		if ($requestPage === "newsletters") $this->model = new NewsletterSubscriber;
		if ($requestPage === "companycontacts") $this->model = new CompanyContact;
		if ($requestPage === "curriculums") $this->model = new Curriculum;
		if ($requestPage === "promotionentries") $this->model = new PromotionEntry;
	}

	/**
	 * Shows the initial table load view of a page
	 *
	 * @param  $request http request
	 * @param  $response
	 * @param  $args (page = routing)
	 *
	 * @return $response twig view with array and count of data passed
	 */

	public function showAdminInitialView($request, $response, $args)
	{
		$this->selectActiveModel($args["page"]);
		$count = $this->model->count();
		$models = $this->model->take(25)->offset(0)->get();
		return $this->view->render($response, $this->model->pageTemplate, ['data' => $models, 'count' => $count, 'page' => 1, 'pagesize' => 25, 'canedit' => Auth::user()->hasPermission('canedit')]);
	}

	/**
	 * Updates a model from inline editing in the user admin area
	 *
	 * @param  $request http request
	 * {page: pagereference, pk: primary key, name: field value: new value}
	 *
	 * @return void
	 */

	public function adminEditData($request, $response)
	{
		if (!Auth::user()->hasPermission('canedit')) return;

		$data = $request->getParams(); 
		$this->selectActiveModel($data["page"]);
		$model = $this->model->find($data["pk"]);
		$model[$data["name"]] = $data["value"];
		$model->save();
	}

	/**
	 * Updates a model from a request from the user admin area - returns a new view of the row to update
	 *
	 * @param  $request http request
	 * {page: pagereference, pk: primary key, name: field value: new value}
	 *
	 * @return twig template
	 */

	public function adminUpdateData($request, $response)
	{
		if (!Auth::user()->hasPermission('canedit')) return;

		$data = $request->getParams(); 
		$this->selectActiveModel($data["page"]);
		if ($data["value"] === "true" || $data["value"] === "false") $data["value"] = filter_var($data["value"], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
		$model = $this->model->find($data["pk"]);
		$model[$data["name"]] = $data["value"];
		$model->save();
		$this->view->render($response, $this->model->tableRowTemplate, ['row' => $model, 'canedit' => Auth::user()->hasPermission('canedit')]);;
	}

	/**
	 * Deletes a model from a request from the user admin area the user admin area
	 *
	 * @param  $request http request
	 * {page: pagereference, pk: primary key, name: field value: new value}
	 *
	 * @return void
	 */


	public function adminDeleteData($request, $response)
	{
		if (!Auth::user()->hasPermission('canedit')) return;

		$data = $request->getParams(); 
		$this->selectActiveModel($data["page"]);
		$model = $this->model->find($data["pk"]);
		$model->delete();
	}

	/**
	 * Refreshes a table after pagination request
	 *
	 * @param  $request http request
	 * {page: pagereference, value: current selected page}
	 * @param  $response 
	 *
	 * @return twig template
	 */

	public function refreshPaginateTable($request, $response)
	{
		$data = $request->getParams(); 
		$this->selectActiveModel($data["page"]);
		$page = (int) $data["value"];
		$pageSize = (int) $data["pagesize"];

		$params = array(
			"count" => $this->model->count(),
			"page" => $page,
			"pagesize" => $pageSize,
			"data" => $this->model->take($pageSize)->offset($pageSize * ($page - 1))->get(),
			'canedit' => Auth::user()->hasPermission('canedit')
		);

		$this->view->render($response, $this->model->tableTemplate, $params);;

	}
}