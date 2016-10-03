<?php
namespace App\Mailer;

use Cake\Core\Configure;
use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    /**
     * @param $user
     * @throws \InvalidArgumentException
     */
    public function welcome($user)
    {
        $this->__prepareEmail($user, 'welcome');
    }

    /**
     * @param $user
     * @throws \InvalidArgumentException
     */
    public function resetPassword($user)
    {
        $this->__prepareEmail($user, 'reset');
    }

    /**
     * @param $user
     * @param $type
     */
    private function __prepareEmail($user, $type)
    {
        switch ($type) {
            case 'reset':
                $subject = sprintf('Password reset for %s', $user->full_name);
                break;
            case 'welcome':
                $subject = sprintf('Welcome %s', $user->full_name);
                break;
        }
        $this
            ->to($user->email)
            ->from([Configure::read('dyn.support.email') => Configure::read('dyn.support.name')])
            ->subject($subject)
            ->set(compact('user'))
            ->template($type, 'default');
    }
}
