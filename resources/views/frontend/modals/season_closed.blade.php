<!-- Season Closed Modal -->
<div class="modal fade" id="seasonClosedModal" tabindex="-1" aria-labelledby="seasonClosedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content p-3">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <div class="mb-4">
                    <i class="icofont-clock-time fs-60 text-gold wow pulse" data-wow-iteration="infinite"></i>
                </div>
                <h3 class="text-white text-uppercase mb-3">Application Submissions Closed</h3>
                <p class="text-white-50 mb-4">
                    Thank you for your interest. Current season applications are now closed.
                    @if ($nextSeason)
                        <br>The new season will start on <span
                            class="text-gold fw-bold">{{ $nextSeason->opening_date->format('F d, Y') }}</span>.
                    @else
                        <br>Stay tuned for updates on our next season.
                    @endif
                </p>

                @if ($nextSeason)
                    <div class="countdown-wrapper mb-4">
                        <h5 class="text-white mb-3">Countdown to Next Season</h5>
                        <div id="seasonCountdown" class="d-flex justify-content-center gap-2">
                            <div class="countdown-item">
                                <span class="days fs-30 fw-bold text-gold">00</span>
                                <small class="d-block text-white-50">Days</small>
                            </div>
                            <div class="countdown-item">
                                <span class="hours fs-30 fw-bold text-gold">00</span>
                                <small class="d-block text-white-50">Hrs</small>
                            </div>
                            <div class="countdown-item">
                                <span class="minutes fs-30 fw-bold text-gold">00</span>
                                <small class="d-block text-white-50">Mins</small>
                            </div>
                            <div class="countdown-item">
                                <span class="seconds fs-30 fw-bold text-gold">00</span>
                                <small class="d-block text-white-50">Secs</small>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="mt-4">
                    <button type="button" class="btn-main px-4 py-2" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #seasonClosedModal .modal-content {
        max-height: 90vh;
        overflow-y: auto;
        background: rgba(10, 10, 10, 0.98) !important;
        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);
        border: 1px solid rgba(255, 215, 0, 0.4) !important;
        box-shadow: 0 0 50px rgba(0, 0, 0, 0.9);
        color: #ffffff !important;
    }

    #seasonClosedModal .modal-header .btn-close {
        filter: invert(1) grayscale(100%) brightness(200%);
        opacity: 0.8;
        transition: all 0.3s ease;
        z-index: 1060;
    }

    #seasonClosedModal .modal-header .btn-close:hover {
        opacity: 1;
        transform: rotate(90deg);
        filter: invert(1) grayscale(100%) brightness(200%) drop-shadow(0 0 5px #FFD700);
    }

    #seasonClosedModal .text-gold {
        color: #FFD700 !important;
    }

    #seasonClosedModal .fs-60 {
        font-size: 60px;
    }

    #seasonClosedModal .fs-30 {
        font-size: 30px;
    }

    #seasonClosedModal .countdown-item {
        background: rgba(255, 215, 0, 0.05);
        padding: 12px;
        border-radius: 10px;
        min-width: 75px;
        border: 1px solid rgba(255, 215, 0, 0.2);
        transition: all 0.3s ease;
    }

    #seasonClosedModal .countdown-item:hover {
        background: rgba(255, 215, 0, 0.1);
        border-color: rgba(255, 215, 0, 0.5);
        transform: translateY(-5px);
    }

    /* Modal Button Fixes */
    #seasonClosedModal .btn-main {
        background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%) !important;
        color: #000 !important;
        border: none !important;
        font-weight: 700 !important;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
        position: relative;
        overflow: hidden;
        display: inline-block;
        z-index: 1;
    }

    #seasonClosedModal .btn-main:hover {
        background: linear-gradient(135deg, #FFA500 0%, #FFD700 100%) !important;
        color: #000 !important;
        transform: scale(1.05) translateY(-2px);
        box-shadow: 0 5px 20px rgba(255, 215, 0, 0.4);
    }

    #seasonClosedModal .modal-body {
        position: relative;
        z-index: 2;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if ($nextSeason)
            const targetDate = new Date("{{ $nextSeason->opening_date->format('Y-m-d H:i:s') }}").getTime();

            function updateCountdown() {
                const now = new Date().getTime();
                const distance = targetDate - now;

                if (distance < 0) {
                    clearInterval(countdownInterval);
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                const el = document.getElementById('seasonCountdown');
                if (el) {
                    el.querySelector('.days').innerText = days.toString().padStart(2, '0');
                    el.querySelector('.hours').innerText = hours.toString().padStart(2, '0');
                    el.querySelector('.minutes').innerText = minutes.toString().padStart(2, '0');
                    el.querySelector('.seconds').innerText = seconds.toString().padStart(2, '0');
                }
            }

            const countdownInterval = setInterval(updateCountdown, 1000);
            updateCountdown();
        @endif
    });
</script>
