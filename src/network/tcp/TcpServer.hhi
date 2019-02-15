<?hh // strict

namespace HH\Lib\Experimental\Network;

use type Throwable;

/**
 * TCP socket server.
 */
final class TcpServer implements Server {
  /**
   * Servers are created using listen().
   */
  private function __construct();

  /**
   * Create a TCP server listening on the given interface and port.
   */
  public static function listen(
    string $host,
    int $port,
  ): TcpServer;

  /**
   * {@inheritdoc}
   */
  public function close(?Throwable $e = null): void;

  /**
   * {@inheritdoc}
   */
  public function getAddress(): string;

  /**
   * {@inheritdoc}
   */
  public function getPort(): ?int;

  /**
   * Enable / disable simultaneous asynchronous accept requests that are queued by the operating system
   * when listening for new TCP connections.
   */
  public function setSimultaneousAccept(bool $simultaneous_accepts): void;

  /**
   * {@inheritdoc}
   */
  public function accept(): SocketHandle;
}
