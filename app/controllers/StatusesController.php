<?php

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Input;
    use Larabook\Forms\PublishStatusForm;
    use Larabook\Statuses\PublishStatusCommand;
    use Larabook\Statuses\StatusRepository;
    use Laracasts\Flash\Flash;

    class StatusesController extends \BaseController
    {
        protected $statusRepository;
        /**
         * @var PublishStatusForm
         */
        protected $publishStatusForm;

        /**
         * StatusesController constructor.
         * @param PublishStatusForm $publishStatusForm
         * @param StatusRepository $statusRepository
         */
        public function __construct(PublishStatusForm $publishStatusForm, StatusRepository $statusRepository)
        {
            $this->statusRepository = $statusRepository;
            $this->publishStatusForm = $publishStatusForm;
        }

        /**
         * Display a listing of the resource.
         *
         * @return Response
         */
        public function index()
        {
            $statuses = $this->statusRepository->getAllForUser(Auth::user());

            return View::make('statuses.index', compact('statuses'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @return Response
         */
        public function store()
        {
            $input = Input::get();
            $input['userId'] = Auth::id();

            $this->publishStatusForm->validate($input);

            $this->execute(PublishStatusCommand::class, $input);

            Flash::message('Your status has been updated');

            return Redirect::back();
        }
    }
