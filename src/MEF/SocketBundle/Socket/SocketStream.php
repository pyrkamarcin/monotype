<?php

namespace MEF\SocketBundle\Socket;

use Symfony\Component\EventDispatcher\EventDispatcher;

class SocketStream extends EventDispatcher
{

    public $serializer;
    /**
     * a unique id the application can use to access persistent sockets.
     *
     * @var mixed
     * @access protected
     */
    protected $id;
    /**
     * is_closed
     *
     * (default value: false)
     *
     * @var bool
     * @access protected
     */
    protected $is_closed = false;
    /**
     * chunkLength
     *
     * (default value: 1024)
     *
     * @var int
     * @access protected
     */
    protected $chunkLength = 1024;

    /**
     * __construct function.
     *
     * @access public
     * @param mixed $stream
     * @return void
     */
    public function __construct($stream, $serializer)
    {
        $this->stream = $stream;

        $this->serializer = $serializer;


    }

    /**
     * getStream function.
     *
     * @access public
     * @return void
     */
    public function getStream()
    {
        return $this->stream;
    }

    public function sendMessage($message)
    {
        $message = $this->serializer->serialize($message);
        return $this->write($message);
    }

    /**
     * write function.
     *
     * @access public
     * @param mixed $message
     * @return void
     */
    public function write($message)
    {
        if ($this->isClosed()) {
            return false;
        }

        try {
            return socket_write($this->stream, $message);
        } catch (\ErrorException $e) {
            //@todo log exception
            $this->close();
            return false;
        }

    }

    /**
     * isClosed function.
     *
     * @access public
     * @return void
     */
    public function isClosed()
    {
        return $this->is_closed;
    }

    /**
     * close function.
     *
     * @access public
     * @return void
     */
    public function close()
    {

        $this->is_closed = true;
        // socket_close($this->stream);

    }

    /**
     * writeln function.
     *
     * @access public
     * @param mixed $message
     * @return void
     */
    public function writeln($message)
    {
        $message .= "\n";
        return $this->write($message);
    }

    public function read()
    {
        if ($this->isClosed()) {
            return false;
        } else {
            return socket_read($this->stream, $this->chunkLength);
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getById($id)
    {
        if (isset($this->messageHash[$id])) {
            return $this->messageHash[$id];
        } else {
            return false;
        }
    }

}