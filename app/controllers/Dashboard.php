<?php

class Dashboard extends Controller
{

    /**
     * User dashboard
     *
     * @return string
     */
    public function my()
    {
        $this->isLoggedInOrExit();

        $this->view->setTitle('Account');
        $this->view->renderTemplate('dashboard/my');

        return $this->showContent();
    }

    /**
     * Admin dashboard
     *
     * @return string
     */
    public function index()
    {
        $this->isAdminOrExit();

        $this->view->setTitle('Account');
        $this->view->renderTemplate('dashboard/index');


        try {
            $ch = curl_init('https://status.ezxss.com/?v=' . version);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['User-Agent: ezXSS']);
            curl_setopt($ch, CURLOPT_TIMEOUT, 2);
            $release = json_decode(curl_exec($ch), true);
        } catch (Exception $e) {
            $release = [['?', '?', '?']];
        }

        $this->view->renderData('repoVersion', $release[0]['release']);
        $this->view->renderData('repoBody', $release[0]['body']);
        $this->view->renderData('repoUrl', $release[0]['zipball_url']);

        $this->view->renderData('notepad', $this->model('Setting')->get('notepad'));

        return $this->showContent();
    }
}