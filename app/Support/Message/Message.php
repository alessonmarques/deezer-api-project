<?php
namespace app\Support\Message;


class Message
{
    private $text;
    private $type;

    public function getType()
    {
        return $this->type;
    }
    public function getText()
    {
        return $this->text;
    }

    public function error(string $message): Message
    {
        $this->type = 'danger';
        $this->text = $message;
        return $this;
    }

    public function success(string $message): Message
    {
        $this->type = 'success';
        $this->text = $message;
        return $this;
    }

    public function info(string $message): Message
    {
        $this->type = 'info';
        $this->text = $message;
        return $this;
    }

    public function warning(string $message): Message
    {
        $this->type = 'warning';
        $this->text = $message;
        return $this;
    }

    public function render()
    {
        return "<div class='messageBox bg-{$this->getType()}'>{$this->getText()}</div>";
    }
}
