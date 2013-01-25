<?php
/***************************************************************************
 *   Copyright (C) 2006 by Unknown Hero                                    *
 *   non.existent.login@forgotten.host                                     *
 ***************************************************************************/
/* $Id$ */

	class main implements Controller
	{
		public function handleRequest(HttpRequest $request)
		{
            echo $request->getAttachedVar('cookieSupported')? 'true': 'false';
		    return ModelAndView::create()->setView('main');
		}
	}
?>